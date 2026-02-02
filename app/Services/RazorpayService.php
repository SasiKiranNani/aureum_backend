<?php

namespace App\Services;

class RazorpayService extends PaymentService
{
    public function getGatewayUrl(): string
    {
        return 'https://api.razorpay.com/v1/';
    }

    public function createPayment(array $data)
    {
        \Log::info('Razorpay Credentials', [
            'key' => $this->gateway->key,
            'secret_length' => strlen($this->gateway->secret),
            'key_hex' => bin2hex($this->gateway->key),
            'secret_hex' => bin2hex($this->gateway->secret)
        ]);
        $api = new \Razorpay\Api\Api($this->gateway->key, $this->gateway->secret);

        $order = $api->order->create([
            'receipt' => ($data['nomination_id'] ?? false) ? 'nom_' . $data['nomination_id'] : 'evt_' . $data['event_booking_id'],
            'amount' => $data['amount'] * 100, // in paise
            'currency' => 'USD',
            'notes' => [
                'nomination_id' => (string)($data['nomination_id'] ?? ''),
                'event_booking_id' => (string)($data['event_booking_id'] ?? ''),
            ],
        ]);

        return [
            'key' => $this->gateway->key,
            'amount' => $order['amount'],
            'currency' => 'USD',
            'name' => 'ORIONSM International Tech Awards',
            'description' => $data['productinfo'] ?? 'Nomination Fee',
            'order_id' => $order['id'],
            'prefill' => [
                'name' => $data['payer_name'],
                'email' => $data['payer_email'],
                'contact' => $data['payer_phone'],
            ],
            'notes' => [
                'nomination_id' => (string)($data['nomination_id'] ?? ''),
                'event_booking_id' => (string)($data['event_booking_id'] ?? ''),
            ],
            'theme' => [
                'color' => '#FFD700',
            ],
        ];
    }

    public function verifyPayment(array $requestData): bool
    {
        $api = new \Razorpay\Api\Api($this->gateway->key, $this->gateway->secret);
        try {
            $attributes = [
                'razorpay_order_id' => $requestData['razorpay_order_id'],
                'razorpay_payment_id' => $requestData['razorpay_payment_id'],
                'razorpay_signature' => $requestData['razorpay_signature']
            ];
            $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            \Log::error('Razorpay Signature Verification Failed: ' . $e->getMessage());
            return false;
        }
    }
}
