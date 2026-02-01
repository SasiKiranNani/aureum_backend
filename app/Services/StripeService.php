<?php

namespace App\Services;

class StripeService extends PaymentService
{
    public function getGatewayUrl(): string
    {
        // Stripe typically uses SDK, but if redirecting:
        return 'https://api.stripe.com/v1/checkout/sessions';
    }

    public function createPayment(array $data)
    {
        \Stripe\Stripe::setApiKey($this->gateway->secret);

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $data['productinfo'] ?? 'Award Nomination Fee',
                    ],
                    'unit_amount' => $data['amount'] * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.failure'),
            'metadata' => [
                'nomination_id' => $data['nomination_id'] ?? null,
                'event_booking_id' => $data['event_booking_id'] ?? null,
            ],
        ]);

        return [
            'url' => $session->url,
            'session_id' => $session->id,
        ];
    }

    public function verifyPayment(array $requestData): bool
    {
        return true;
    }
}
