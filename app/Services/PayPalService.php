<?php

namespace App\Services;

use App\Models\PaymentGateway;

class PayPalService extends PaymentService
{
    public function getGatewayUrl(): string
    {
        $mode = strtolower($this->gateway->mode->value ?? $this->gateway->mode ?? 'sandbox');
        return $mode === 'production'
            ? 'https://www.paypal.com/cgi-bin/webscr'
            : 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }

    public function createPayment(array $data)
    {
        $mode = strtolower($this->gateway->mode->value ?? $this->gateway->mode ?? 'sandbox');
        $baseUrl = $mode === 'production' 
            ? 'https://api-m.paypal.com' 
            : 'https://api-m.sandbox.paypal.com';

        // 1. Get Access Token
        $response = \Illuminate\Support\Facades\Http::asForm()
            ->withBasicAuth($this->gateway->key, $this->gateway->secret)
            ->post("{$baseUrl}/v1/oauth2/token", [
                'grant_type' => 'client_credentials',
            ]);

        if (!$response->successful()) {
            throw new \Exception('PayPal Auth Failed: ' . $response->body());
        }

        $accessToken = $response->json()['access_token'];

        // 2. Create Order
        $orderResponse = \Illuminate\Support\Facades\Http::withToken($accessToken)
            ->post("{$baseUrl}/v2/checkout/orders", [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($data['amount'], 2, '.', ''),
                    ],
                    'description' => $data['productinfo'] ?? 'Award Nomination Fee',
                    'custom_id' => isset($data['nomination_id']) ? 'NOM-' . $data['nomination_id'] : 'EVT-' . $data['event_booking_id'],
                ]],
                'application_context' => [
                    'return_url' => route('payment.success'),
                    'cancel_url' => route('payment.failure'),
                ],
            ]);

        if (!$orderResponse->successful()) {
            throw new \Exception('PayPal Order Creation Failed: ' . $orderResponse->body());
        }

        $orderData = $orderResponse->json();
        $redirectUrl = collect($orderData['links'])->where('rel', 'approve')->first()['href'];

        return [
            'url' => $redirectUrl,
            'order_id' => $orderData['id'],
        ];
    }

    public function verifyPayment(array $requestData): bool
    {
        // IPN verification logic
        return true; 
    }
}
