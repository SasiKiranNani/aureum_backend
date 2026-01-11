<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminFee extends Model
{
    protected $fillable = ['amount', 'is_active'];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($adminFee) {
            if ($adminFee->is_active) {
                // Deactivate all other fees
                static::where('id', '!=', $adminFee->id)->update(['is_active' => false]);
            }
        });
    }
}
