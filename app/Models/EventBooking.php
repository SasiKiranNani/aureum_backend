<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'event_id',
        'ticket_number',
        'amount',
        'payment_status',
        'payment_gateway',
        'transaction_id',
        'manual_payment_invoice',
        'payment_details',
        'paid_at',
    ];

    protected $casts = [
        'payment_details' => 'array',
        'paid_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static function generateBookingId()
    {
        return 'EVT-'.strtoupper(uniqid());
    }

    public static function generateTicketNumber()
    {
        return 'TKT-'.date('Ymd').'-'.strtoupper(bin2hex(random_bytes(3)));
    }
}
