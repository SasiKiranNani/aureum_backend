<?php

namespace App\Services;

class PayUService extends PaymentService
{
    public function getGatewayUrl(): string
    {
        $mode = strtolower($this->gateway->mode->value ?? $this->gateway->mode ?? 'sandbox');
        return $mode === 'production'
            ? env('PAYU_URL_PRODUCTION', 'https://secure.payu.in/_payment')
            : env('PAYU_URL_SANDBOX', 'https://test.payu.in/_payment');
    }

    public function createPayment(array $data)
    {
        // PayU requires amount in INR. Round to 2 decimals.
        $amountUsd = $data['amount'];
        $amountInr = number_format(round($this->exchangeRateService->convertUsdToInr($amountUsd), 2), 2, '.', '');

        $txnid = 'nom_' . $data['nomination_id'] . '_' . time();
        
        // Use only first name for PayU to avoid hash issues with spaces
        $firstname = explode(' ', trim($data['payer_name']))[0];
        $productinfo = $data['productinfo'] ?? 'Nomination_Fee';

        // Exact formula: sha512(key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10|SALT)
        $hashSequence = "{$this->gateway->key}|{$txnid}|{$amountInr}|{$productinfo}|{$firstname}|{$data['payer_email']}|{$data['nomination_id']}||||||||||{$this->gateway->secret}";
        
        \Log::info('PayU Hash Sequence', ['sequence' => $hashSequence]);
        
        $hash = strtolower(hash('sha512', $hashSequence));

        return [
            'url' => $this->getGatewayUrl(),
            'payload' => [
                'key' => $this->gateway->key,
                'txnid' => $txnid,
                'amount' => $amountInr,
                'productinfo' => $productinfo,
                'firstname' => $firstname,
                'email' => $data['payer_email'],
                'phone' => preg_replace('/[^0-9]/', '', $data['payer_phone']),
                'surl' => route('payment.success'),
                'furl' => route('payment.failure'),
                'hash' => $hash,
                'service_provider' => 'payu_paisa',
                'udf1' => $data['nomination_id'],
                'udf2' => '',
                'udf3' => '',
                'udf4' => '',
                'udf5' => '',
                'udf6' => '',
                'udf7' => '',
                'udf8' => '',
                'udf9' => '',
                'udf10' => '',
            ]
        ];
    }

    public function verifyPayment(array $requestData): bool
    {
        $status = $requestData['status'] ?? '';
        $txnid = $requestData['txnid'] ?? '';
        $amount = $requestData['amount'] ?? '';
        $productinfo = $requestData['productinfo'] ?? '';
        $firstname = $requestData['firstname'] ?? '';
        $email = $requestData['email'] ?? '';
        $udf1 = $requestData['udf1'] ?? '';
        $udf2 = $requestData['udf2'] ?? '';
        $udf3 = $requestData['udf3'] ?? '';
        $udf4 = $requestData['udf4'] ?? '';
        $udf5 = $requestData['udf5'] ?? '';
        $udf6 = $requestData['udf6'] ?? '';
        $udf7 = $requestData['udf7'] ?? '';
        $udf8 = $requestData['udf8'] ?? '';
        $udf9 = $requestData['udf9'] ?? '';
        $udf10 = $requestData['udf10'] ?? '';
        $additionalCharges = $requestData['additionalCharges'] ?? '';
        $posted_hash = $requestData['hash'] ?? '';

        // Reverse hash formula: SALT|status|additionalCharges|udf10|udf9|udf8|udf7|udf6|udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key
        $hashSequence = "{$this->gateway->secret}|{$status}|{$additionalCharges}|{$udf10}|{$udf9}|{$udf8}|{$udf7}|{$udf6}|{$udf5}|{$udf4}|{$udf3}|{$udf2}|{$udf1}|{$email}|{$firstname}|{$productinfo}|{$amount}|{$txnid}|{$this->gateway->key}";
        
        $calculated_hash = strtolower(hash('sha512', $hashSequence));

        return ($status === 'success' && $calculated_hash === strtolower($posted_hash));
    }
}
