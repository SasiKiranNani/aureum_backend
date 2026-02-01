<?php

namespace App\Services;

use App\Mail\NominationInvoiceMail;
use App\Models\Nomination;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Season;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

        // Get Season and Payment Gateway settings
        $season = $nomination->season;
        $gateway = $this->gateway;

        // Conditional ID Generation
        $invoiceNo = $gateway->has_invoice ? Nomination::generateInvoiceId($season) : null;
        $itrInvoiceNo = $gateway->has_itr_invoice ? Nomination::generateItrInvoiceId($season) : null;

        // Base Nomination Update
        $nomination->update([
            'payment_status' => 'completed',
            'payment_method' => $gateway->name,
            'amount_paid' => $amountUsd,
            'payment_gateway_id' => $gateway->id,
            'invoice_no' => $invoiceNo,
            'itr_invoice_no' => $itrInvoiceNo,
            'paid_at' => now(),
        ]);

        // Create Payment record
        $payment = Payment::create([
            'transaction_id' => $transactionId,
            'payment_gateway_id' => $gateway->id,
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

        try {
            $paymentDate = now()->format('d M Y');
            $updates = [];

            // Calculate breakdown for Invoice (Strict mapping)
            $awardPrice = $nomination->award ? $nomination->award->amount : 0;
            $adminFee = $nomination->admin_fee ?? 0;
            $couponDiscount = $nomination->discount_applied ?? 0;
            $baseSubtotal = $awardPrice + $adminFee;
            $totalAfterCoupon = $baseSubtotal - $couponDiscount;
            
            // Gateway discount is whatever remains between (Subtotal - Coupon) and actual Amount Paid
            $gatewayDiscount = round($totalAfterCoupon - $amountUsd, 2);
            if ($gatewayDiscount < 0) $gatewayDiscount = 0;

            // 1. Standard Invoice Logic
            if ($gateway->has_invoice && $invoiceNo) {
                $nomination->load(['award', 'category', 'discount' => function($q) {
                    $q->select('id', 'code', 'name');
                }]);

                $pdfContent = Pdf::loadView('pdf.invoice', [
                    'nomination' => $nomination,
                    'payment' => $payment,
                    'invoice_no' => $invoiceNo,
                    'payment_date' => $paymentDate,
                    'is_itr' => false,
                    'subtotal' => $baseSubtotal,
                    'coupon_discount' => $couponDiscount,
                    'gateway_discount' => $gatewayDiscount,
                    'total' => $amountUsd,
                ])->output();

                // Store PDF
                $fileName = 'invoice-'.$invoiceNo.'.pdf';
                $path = 'invoices/standard/'.$fileName;
                Storage::disk('public')->put($path, $pdfContent);
                $updates['invoice_path'] = $path;

                // Send Mail with PDF attachment
                Mail::to($nomination->email)->send(new NominationInvoiceMail(
                    $nomination,
                    $payment,
                    $pdfContent,
                    $fileName
                ));
            }

            // 2. ITR Invoice Logic
            if ($gateway->has_itr_invoice && $itrInvoiceNo) {
                $itrPdfContent = Pdf::loadView('pdf.invoice', [
                    'nomination' => $nomination,
                    'payment' => $payment,
                    'invoice_no' => $itrInvoiceNo,
                    'payment_date' => $paymentDate,
                    'is_itr' => true,
                    'subtotal' => $baseSubtotal,
                    'coupon_discount' => $couponDiscount,
                    'gateway_discount' => $gatewayDiscount,
                    'total' => $amountUsd,
                ])->output();

                // Store ITR PDF
                $itrFileName = 'itr-'.$itrInvoiceNo.'.pdf';
                $itrPath = 'invoices/itr/'.$itrFileName;
                Storage::disk('public')->put($itrPath, $itrPdfContent);
                $updates['itr_invoice_path'] = $itrPath;
            }

            // Apply Path Updates if any
            if (! empty($updates)) {
                $nomination->update($updates);
            }

            Log::info('Invoices Processed', [
                'nomination_id' => $nomination->id,
                'invoice_no' => $invoiceNo,
                'itr_invoice_no' => $itrInvoiceNo,
                'updates' => array_keys($updates),
            ]);

        } catch (\Exception $e) {
            Log::error('Invoice processing failed', [
                'error' => $e->getMessage(),
                'nomination_id' => $nomination->id,
            ]);
        }

        return $payment;
    }

    public function recordSuccessfulEventBooking(string $transactionId, float $amountUsd, \App\Models\EventBooking $booking, array $payerDetails = [])
    {
        $booking->refresh();
        $gateway = $this->gateway;

        $booking->update([
            'payment_status' => 'completed',
            'payment_gateway' => $gateway->name,
            'transaction_id' => $transactionId,
            'payment_details' => $payerDetails,
            'ticket_number' => \App\Models\EventBooking::generateTicketNumber(),
            'paid_at' => now(),
        ]);

        try {
            // Trigger Ticket Email
            \Illuminate\Support\Facades\Mail::to($booking->user->email)->send(new \App\Mail\EventTicket($booking));
        } catch (\Exception $e) {
            Log::error('Event ticket email failed', [
                'error' => $e->getMessage(),
                'booking_id' => $booking->id,
            ]);
        }

        return $booking;
    }
}
