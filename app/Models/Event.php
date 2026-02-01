<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'thumbnail_img',
        'title',
        'event_date',
        'booking_start_date',
        'booking_deadline_date',
        'description',
        'ticket_price',
        'images',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'booking_start_date' => 'date',
        'booking_deadline_date' => 'date',
        'images' => 'array',
        'is_active' => 'boolean',
        'ticket_price' => 'decimal:2',
    ];
}
