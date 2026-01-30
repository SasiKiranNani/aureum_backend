<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsroom extends Model
{
    protected $fillable = [
        'title',
        'image',
        'date',
        'description',
        'is_active',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}
