<?php

namespace App\Mail;

use App\Models\EventBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(EventBooking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('Your Ticket for ' . $this->booking->event->title)
                    ->view('emails.event-ticket');
    }
}
