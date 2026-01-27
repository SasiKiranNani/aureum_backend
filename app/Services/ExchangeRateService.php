<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExchangeRateService
{
    /**
     * Convert USD to INR using ExchangeRate-API
     * 
     * @param float $amount
     * @return float
     */
    public function convertUsdToInr(float $amount): float
    {
        try {
            $apiKey = env('EXCHANGERATE_API_KEY', '892c7846b2b8e30003a134af');
            $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");

            if ($response->successful()) {
                $data = $response->json();
                $rate = $data['conversion_rates']['INR'] ?? null;

                if ($rate) {
                    return round($amount * $rate, 2);
                }
            }

            Log::error('ExchangeRate API failed or INR rate not found.', [
                'response' => $response->body()
            ]);
        } catch (\Exception $e) {
            Log::error('ExchangeRate Service error: ' . $e->getMessage());
        }

        // Fallback rate if API fails (approximate)
        return round($amount * 83.00, 2);
    }
}
