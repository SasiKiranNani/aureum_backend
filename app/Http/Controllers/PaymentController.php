<?php

namespace App\Http\Controllers;

use App\Models\Nomination;
use App\Models\PaymentGateway;
use App\Services\PayPalService;
use App\Services\PayUService;
use App\Services\RazorpayService;
use App\Services\StripeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function initiate(Request $request)
    {
        \Log::info('Payment Initiation Request', $request->all());
        
        try {
            $request->validate([
            'nomination_id' => 'required|exists:nominations,id',
            'payment_method' => 'required|string',
            'discount_id' => 'nullable|integer|exists:discounts,id',
            'discount_code' => 'nullable|string|exists:discounts,code',
        ]);

        $nomination = Nomination::findOrFail($request->nomination_id);

        if ($nomination->payment_status === 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'This nomination has already been paid.'
            ], 400);
        }

        // Update nomination with discount if provided now
        if ($request->discount_id || $request->discount_code) {
            $query = \App\Models\Discount::where('is_active', true);
            
            if ($request->discount_id) {
                $query->where('id', $request->discount_id);
            } else {
                $query->where('code', $request->discount_code);
            }

            $discount = $query->first();

            if ($discount) {
                $discountApplied = 0.00;
                $award = $nomination->award;
                $adminFeeAmount = $nomination->admin_fee ?? 35.00;

                if ($discount->type === 'fixed') {
                    $discountApplied = $discount->value;
                } elseif ($discount->type === 'percentage') {
                    $discountApplied = ($award->amount + $adminFeeAmount) * ($discount->value / 100);
                }
                
                $nomination->update([
                    'discount_applied' => $discountApplied,
                    'discount_id' => $discount->id
                ]);
                $nomination->refresh(); // Refresh to get updated values
                \Log::info('Discount Applied at Initiation', ['nomination_id' => $nomination->id, 'discount_id' => $discount->id, 'amount' => $discountApplied]);
            }
        }

        $gatewayName = strtolower($request->payment_method);
        
        $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', [$gatewayName])
            ->where('is_active', true)
            ->firstOrFail();

        $service = $this->getService($gateway);

        $amount = round(($nomination->amount_paid ?? 0) + ($nomination->admin_fee ?? 0) - ($nomination->discount_applied ?? 0), 2);
        if ($amount < 0) $amount = 0;

        \Log::info('Payment Calculation Details', [
            'nomination_id' => $nomination->id,
            'application_id' => $nomination->application_id,
            'calculated_total' => $amount,
            'discount_applied' => $nomination->discount_applied,
            'discount_id' => $nomination->discount_id
        ]);

        $paymentData = $service->createPayment([
            'nomination_id' => $nomination->id,
            'amount' => $amount,
            'payer_name' => $nomination->full_name,
            'payer_email' => $nomination->email,
            'payer_phone' => $nomination->phone,
            'productinfo' => 'Nomination_Fee', // Added for PayU
        ]);

            return response()->json([
                'success' => true,
                'payment_data' => $paymentData
            ]);
        } catch (\Exception $e) {
            \Log::error('Payment Initiation Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Payment initiation failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function success(Request $request)
    {
        \Log::info('Payment Success Callback', $request->all());

        if ($request->has('session_id')) {
            // Stripe success
            return $this->handleStripeSuccess($request->session_id);
        }

        if ($request->has('token') && !$request->has('razorpay_payment_id')) {
            // PayPal success
            return $this->handlePayPalSuccess($request->token);
        }

        if ($request->has('razorpay_payment_id')) {
            // Razorpay success
            return $this->handleRazorpaySuccess($request);
        }

        if ($request->has('mihpayid')) {
            // PayU success
            return $this->handlePayUSuccess($request);
        }

        // Generic success page for others (PayPal/PayU usually use Webhooks for async update)
        return view('frontend.payment-success');
    }

    protected function handlePayUSuccess($request)
    {
        $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', ['payu'])->first();
        $service = new PayUService($gateway);

        if ($service->verifyPayment($request->all())) {
            $nominationId = $request->udf1;
            $nomination = Nomination::findOrFail($nominationId);
            
            // PayU sends back INR amount. We need the USD equivalent we expected.
            $amountUsd = ($nomination->amount_paid ?? 0) + ($nomination->admin_fee ?? 0) - ($nomination->discount_applied ?? 0);
            if ($amountUsd < 0) $amountUsd = 0;

            $service->recordSuccessfulPayment($request->mihpayid, $amountUsd, $nomination, $request->all());
            
            return view('frontend.payment-success');
        }

        return redirect()->route('payment.failure');
    }

    protected function handleStripeSuccess($sessionId)
    {
        $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', ['stripe'])->first();
        \Stripe\Stripe::setApiKey($gateway->secret);
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($session->payment_status === 'paid') {
            $nomination = Nomination::findOrFail($session->metadata->nomination_id);
            $service = new StripeService($gateway);
            $service->recordSuccessfulPayment($session->payment_intent, $session->amount_total / 100, $nomination, $session->toArray());
            
            return view('frontend.payment-success');
        }

        return redirect()->route('payment.failure');
    }

    protected function handlePayPalSuccess($token)
    {
        $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', ['paypal'])->first();
        $mode = strtolower($gateway->mode->value ?? $gateway->mode ?? 'sandbox');
        $baseUrl = $mode === 'production' ? 'https://api-m.paypal.com' : 'https://api-m.sandbox.paypal.com';

        try {
            // 1. Get Access Token
            $authResponse = \Illuminate\Support\Facades\Http::asForm()
                ->withBasicAuth($gateway->key, $gateway->secret)
                ->post("{$baseUrl}/v1/oauth2/token", ['grant_type' => 'client_credentials']);

            if (!$authResponse->successful()) {
                throw new \Exception('PayPal Auth failed: ' . $authResponse->body());
            }

            $accessToken = $authResponse->json()['access_token'];

            // 2. Capture Order
            $captureResponse = \Illuminate\Support\Facades\Http::withToken($accessToken)
                ->post("{$baseUrl}/v2/checkout/orders/{$token}/capture", (object)[]);

            \Log::info('PayPal Capture Response', ['status' => $captureResponse->status(), 'body' => $captureResponse->json()]);

            if ($captureResponse->successful()) {
                $captureData = $captureResponse->json();
                
                // Extract nomination ID from custom_id (can be in multiple places)
                $purchaseUnit = $captureData['purchase_units'][0] ?? [];
                $capture = $purchaseUnit['payments']['captures'][0] ?? [];
                
                $nominationId = $capture['custom_id'] ?? $purchaseUnit['custom_id'] ?? null;
                
                if (!$nominationId) {
                    throw new \Exception('Nomination ID (custom_id) not found in PayPal response');
                }

                $nomination = Nomination::findOrFail($nominationId);
                $amount = $capture['amount']['value'] ?? $purchaseUnit['amount']['value'] ?? 0;
                
                $service = new PayPalService($gateway);
                $service->recordSuccessfulPayment($capture['id'] ?? $captureData['id'], $amount, $nomination, $captureData);

                return view('frontend.payment-success');
            }
        } catch (\Exception $e) {
            \Log::error('PayPal Success Handling Failed', [
                'error' => $e->getMessage(),
                'token' => $token
            ]);
        }

        return redirect()->route('payment.failure');
    }

    protected function handleRazorpaySuccess($request)
    {
        $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', ['razorpay'])->first();
        $service = new RazorpayService($gateway);
        
        try {
            if ($service->verifyPayment($request->all())) {
                $api = new \Razorpay\Api\Api($gateway->key, $gateway->secret);
                $payment = $api->payment->fetch($request->razorpay_payment_id);
                \Log::info('Razorpay Payment Details', ['id' => $payment->id, 'status' => $payment->status]);
                
                $order = $api->order->fetch($payment->order_id);
                \Log::info('Razorpay Order Details', ['id' => $order->id, 'notes' => $order->notes]);
                
                // Notes can be an object or array depending on SDK version/response
                $notes = $order->notes;
                $nominationId = is_array($notes) ? ($notes['nomination_id'] ?? null) : ($notes->nomination_id ?? (is_object($notes) ? ($notes->nomination_id ?? null) : null));

                // Fallback: Check receipt which is 'nom_{id}'
                if (!$nominationId && isset($order->receipt) && str_starts_with($order->receipt, 'nom_')) {
                    $nominationId = str_replace('nom_', '', $order->receipt);
                    \Log::info('Razorpay nomination_id recovered from receipt', ['nomination_id' => $nominationId]);
                }

                \Log::info('Razorpay Extraction Result', [
                    'extracted_nomination_id' => $nominationId,
                    'notes_raw' => json_encode($notes),
                    'receipt' => $order->receipt ?? 'n/a'
                ]);

                if ($payment->status === 'captured' && $nominationId) {
                    $nomination = Nomination::findOrFail($nominationId);
                    $service->recordSuccessfulPayment($payment->id, $payment->amount / 100, $nomination, $payment->toArray());
                } else {
                    \Log::warning('Razorpay Record Not Created', [
                        'status' => $payment->status,
                        'nomination_id' => $nominationId
                    ]);
                }
            }
        } catch (\Exception $e) {
            \Log::error('Razorpay Success Processing Failed: ' . $e->getMessage());
        }
        
        return view('frontend.payment-success');
    }

    public function failure(Request $request)
    {
        return view('frontend.payment-failure');
    }

    public function webhook(Request $request, $gatewayName)
    {
        $gateway = PaymentGateway::where('name', $gatewayName)->firstOrFail();
        $service = $this->getService($gateway);

        if ($service->verifyPayment($request->all())) {
            // Logic to finalize payment
            // $service->recordSuccessfulPayment(...)
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'failed'], 400);
    }

    protected function getService(PaymentGateway $gateway)
    {
        return match (strtolower($gateway->name)) {
            'paypal' => new PayPalService($gateway),
            'payu' => new PayUService($gateway),
            'stripe' => new StripeService($gateway),
            'razorpay' => new RazorpayService($gateway),
            default => throw new \Exception("Gateway not supported"),
        };
    }
}
