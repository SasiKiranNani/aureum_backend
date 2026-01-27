<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'payment_gateway_id',
        'nomination_id',
        'amount_usd',
        'amount_inr',
        'status',
        'payer_details',
    ];

    protected $casts = [
        'payer_details' => 'array',
        'amount_usd' => 'decimal:2',
        'amount_inr' => 'decimal:2',
    ];

    public function paymentGateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function nomination(): BelongsTo
    {
        return $this->belongsTo(Nomination::class);
    }
}
