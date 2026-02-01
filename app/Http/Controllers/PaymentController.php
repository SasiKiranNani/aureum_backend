<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
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
                'nomination_id' => 'required_without:event_booking_id|exists:nominations,id',
                'event_booking_id' => 'required_without:nomination_id|exists:event_bookings,id',
                'payment_method' => 'required|string',
                'discount_id' => 'nullable|integer|exists:discounts,id',
                'discount_code' => 'nullable|string|exists:discounts,code',
            ]);

            $gatewayName = strtolower($request->payment_method);
            $gateway = PaymentGateway::whereRaw('LOWER(name) = ?', [$gatewayName])
                ->where('is_active', true)
                ->firstOrFail();

            $service = $this->getService($gateway);

            if ($request->has('nomination_id')) {
                return $this->initiateNominationPayment($request, $gateway, $service);
            } else {
                return $this->initiateEventPayment($request, $gateway, $service);
            }

        } catch (\Exception $e) {
            \Log::error('Payment Initiation Failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment initiation failed: '.$e->getMessage(),
            ], 500);
        }
    }

    protected function initiateNominationPayment(Request $request, $gateway, $service)
    {
        $nomination = Nomination::with(['award', 'category', 'discount'])->findOrFail($request->nomination_id);

        if ($nomination->payment_status === 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'This nomination has already been paid.',
            ], 400);
        }

        // Backend date validation for season
        if ($nomination->season) {
            $now = now();
            if ($now->lt($nomination->season->opening_date) || $now->gt($nomination->season->application_deadline_date->endOfDay())) {
                return response()->json([
                    'success' => false,
                    'message' => 'The season for this nomination is currently closed for payments.',
                ], 400);
            }
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
                $awardPrice = $nomination->award ? $nomination->award->amount : 0;
                $adminFeeAmount = $nomination->admin_fee ?? 35.00;
                $discountApplied = 0.00;

                if ($discount->type === 'fixed') {
                    $discountApplied = $discount->value;
                } elseif ($discount->type === 'percentage') {
                    $discountApplied = ($awardPrice + $adminFeeAmount) * ($discount->value / 100);
                }

                $nomination->update([
                    'discount_applied' => $discountApplied,
                    'discount_id' => $discount->id,
                ]);
                $nomination->refresh(); // Refresh to get updated values
            }
        }

        $awardPrice = $nomination->award ? $nomination->award->amount : 0;
        $adminFee = $nomination->admin_fee ?? 0;
        $couponDiscount = $nomination->discount_applied ?? 0;

        $subtotal = ($awardPrice + $adminFee) - $couponDiscount;
        if ($subtotal < 0) {
            $subtotal = 0;
        }

        $gatewayDiscountValue = 0;
        if ($gateway->discount > 0) {
            $gatewayDiscountValue = $subtotal * ($gateway->discount / 100);
        }

        $amount = round($subtotal - $gatewayDiscountValue, 2);
        if ($amount < 0) {
            $amount = 0;
        }

        $paymentData = $service->createPayment([
            'nomination_id' => $nomination->id,
            'amount' => $amount,
            'payer_name' => $nomination->full_name,
            'payer_email' => $nomination->email,
            'payer_phone' => $nomination->phone,
            'productinfo' => 'Nomination_Fee',
        ]);

        return response()->json([
            'success' => true,
            'payment_data' => $paymentData,
        ]);
    }

    protected function initiateEventPayment(Request $request, $gateway, $service)
    {
        $booking = EventBooking::with(['event', 'user'])->findOrFail($request->event_booking_id);

        if ($booking->payment_status === 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'This booking has already been paid.',
            ], 400);
        }

        // Backend date validation for event
        if ($booking->event) {
            $now = now();
            if ($now->lt($booking->event->booking_start_date) || $now->gt($booking->event->booking_deadline_date->endOfDay())) {
                return response()->json([
                    'success' => false,
                    'message' => 'The booking window for this event is currently closed.',
                ], 400);
            }
        }

        // NO DISCOUNTS for event bookings as per request
        $amount = $booking->amount;

        $paymentData = $service->createPayment([
            'event_booking_id' => $booking->id,
            'amount' => $amount,
            'payer_name' => $booking->user->name,
            'payer_email' => $booking->user->email,
            'payer_phone' => $booking->user->phone ?? '0000000000',
            'productinfo' => 'Event_Ticket',
        ]);

        return response()->json([
            'success' => true,
            'payment_data' => $paymentData,
        ]);
    }

    public function success(Request $request)
    {
        \Log::info('Payment Success Callback', $request->all());

        if ($request->has('session_id')) {
            // Stripe success
            return $this->handleStripeSuccess($request->session_id);
        }

        if ($request->has('token') && ! $request->has('razorpay_payment_id')) {
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
            if ($request->udf2 === 'event_booking') {
                $booking = EventBooking::findOrFail($request->udf1);
                $service->recordSuccessfulEventBooking($request->mihpayid, $booking->amount, $booking, $request->all());
            } else {
                $nomination = Nomination::findOrFail($request->udf1);
                $amountUsd = ($nomination->amount_paid ?? 0) + ($nomination->admin_fee ?? 0) - ($nomination->discount_applied ?? 0);
                if ($amountUsd < 0) {
                    $amountUsd = 0;
                }
                $service->recordSuccessfulPayment($request->mihpayid, $amountUsd, $nomination, $request->all());
            }

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
            $service = new StripeService($gateway);
            if (isset($session->metadata->event_booking_id) && $session->metadata->event_booking_id) {
                $booking = EventBooking::findOrFail($session->metadata->event_booking_id);
                $service->recordSuccessfulEventBooking($session->payment_intent, $session->amount_total / 100, $booking, $session->toArray());
            } else {
                $nomination = Nomination::findOrFail($session->metadata->nomination_id);
                $service->recordSuccessfulPayment($session->payment_intent, $session->amount_total / 100, $nomination, $session->toArray());
            }

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

            if (! $authResponse->successful()) {
                throw new \Exception('PayPal Auth failed: '.$authResponse->body());
            }

            $accessToken = $authResponse->json()['access_token'];

            // 2. Capture Order
            $captureResponse = \Illuminate\Support\Facades\Http::withToken($accessToken)
                ->post("{$baseUrl}/v2/checkout/orders/{$token}/capture", (object) []);

            \Log::info('PayPal Capture Response', ['status' => $captureResponse->status(), 'body' => $captureResponse->json()]);

            if ($captureResponse->successful()) {
                $captureData = $captureResponse->json();

                // Extract nomination ID from custom_id (can be in multiple places)
                $purchaseUnit = $captureData['purchase_units'][0] ?? [];
                $capture = $purchaseUnit['payments']['captures'][0] ?? [];

                $prefixedId = $capture['custom_id'] ?? $purchaseUnit['custom_id'] ?? null;

                if (! $prefixedId) {
                    throw new \Exception('ID (custom_id) not found in PayPal response');
                }

                $amount = $capture['amount']['value'] ?? $purchaseUnit['amount']['value'] ?? 0;
                $service = new PayPalService($gateway);

                if (str_starts_with($prefixedId, 'EVT-')) {
                    $bookingId = substr($prefixedId, 4);
                    $booking = EventBooking::findOrFail($bookingId);
                    $service->recordSuccessfulEventBooking($capture['id'] ?? $captureData['id'], $amount, $booking, $captureData);
                } else {
                    $nominationId = str_starts_with($prefixedId, 'NOM-') ? substr($prefixedId, 4) : $prefixedId;
                    $nomination = Nomination::findOrFail($nominationId);
                    $service->recordSuccessfulPayment($capture['id'] ?? $captureData['id'], $amount, $nomination, $captureData);
                }

                return view('frontend.payment-success');
            }
        } catch (\Exception $e) {
            \Log::error('PayPal Success Handling Failed', [
                'error' => $e->getMessage(),
                'token' => $token,
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
                $eventBookingId = is_array($notes) ? ($notes['event_booking_id'] ?? null) : ($notes->event_booking_id ?? (is_object($notes) ? ($notes->event_booking_id ?? null) : null));

                // Fallback: Check receipt which is 'nom_{id}' or 'evt_{id}'
                if (! $nominationId && ! $eventBookingId && isset($order->receipt)) {
                    if (str_starts_with($order->receipt, 'nom_')) {
                        $nominationId = str_replace('nom_', '', $order->receipt);
                    } elseif (str_starts_with($order->receipt, 'evt_')) {
                        $eventBookingId = str_replace('evt_', '', $order->receipt);
                    }
                }

                \Log::info('Razorpay Extraction Result', [
                    'extracted_nomination_id' => $nominationId,
                    'extracted_event_booking_id' => $eventBookingId,
                    'notes_raw' => json_encode($notes),
                    'receipt' => $order->receipt ?? 'n/a',
                ]);

                if ($payment->status === 'captured') {
                    if ($eventBookingId) {
                        $booking = EventBooking::findOrFail($eventBookingId);
                        $service->recordSuccessfulEventBooking($payment->id, $payment->amount / 100, $booking, $payment->toArray());
                    } elseif ($nominationId) {
                        $nomination = Nomination::findOrFail($nominationId);
                        $service->recordSuccessfulPayment($payment->id, $payment->amount / 100, $nomination, $payment->toArray());
                    }
                } else {
                    \Log::warning('Razorpay Record Not Created', [
                        'status' => $payment->status,
                        'nomination_id' => $nominationId,
                        'event_booking_id' => $eventBookingId,
                    ]);
                }
            }
        } catch (\Exception $e) {
            \Log::error('Razorpay Success Processing Failed: '.$e->getMessage());
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
            default => throw new \Exception('Gateway not supported'),
        };
    }
}
