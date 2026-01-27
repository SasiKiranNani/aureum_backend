<?php

namespace App\Services;

use App\Models\PaymentGateway;
use App\Models\Payment;
use App\Models\Nomination;
use Illuminate\Support\Facades\Log;

abstract class PaymentService
{
    protected $gateway;
    protected $exchangeRateService;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
        $this->exchangeRateService = app(ExchangeRateService::class);
    }

    /**
     * Get the gateway URL based on mode
     */
    abstract public function getGatewayUrl(): string;

    /**
     * Process the payment
     */
    abstract public function createPayment(array $data);

    /**
     * Verify the payment
     */
    abstract public function verifyPayment(array $requestData): bool;

    /**
     * Store payment and nomination details after success
     */
    public function recordSuccessfulPayment(string $transactionId, float $amountUsd, Nomination $nomination, array $payerDetails = [])
    {
        $nomination->refresh();
        $amountInr = $this->exchangeRateService->convertUsdToInr($amountUsd);

        // Update Nomination status
        $nomination->update([
            'payment_status' => 'completed',
            'payment_method' => $this->gateway->name,
            'amount_paid' => $amountUsd,
            'payment_gateway_id' => $this->gateway->id,
        ]);

        // Create Payment record
        $payment = Payment::create([
            'transaction_id' => $transactionId,
            'payment_gateway_id' => $this->gateway->id,
            'nomination_id' => $nomination->id,
            'amount_usd' => $amountUsd,
            'amount_inr' => $amountInr,
            'status' => 'completed',
            'payer_details' => $payerDetails,
        ]);

        // Deactivate discount if applied
        if ($nomination->discount_id) {
            \App\Models\Discount::where('id', $nomination->discount_id)->update(['is_active' => false]);
            Log::info('Discount Deactivated', ['discount_id' => $nomination->discount_id, 'nomination_id' => $nomination->id]);
        }

        return $payment;
    }
}
