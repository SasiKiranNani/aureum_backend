<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickCredFee extends Model
{
    protected $fillable = ['amount', 'is_active'];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($fee) {
            if ($fee->is_active) {
                // Deactivate all other fees
                static::where('id', '!=', $fee->id)->update(['is_active' => false]);
            }
        });
    }
}
