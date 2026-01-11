<?php

namespace App\Models;

use App\Enums\PaymentGatewayMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'mode',
        'currency',
        'secret',
        'key',
        'webhook_id',
        'discount',
        'has_invoice',
        'has_itr_invoice',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'has_invoice' => 'boolean',
        'has_itr_invoice' => 'boolean',
        'discount' => 'decimal:2',
        'mode' => PaymentGatewayMode::class,
    ];
}
