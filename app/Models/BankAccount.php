<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'holder_name',
        'account_number',
        'account_type',
        'routing_number',
        'swift_bic',
        'address',
        'is_active',
    ];
}
