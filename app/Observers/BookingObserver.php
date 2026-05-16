<?php

namespace App\Observers;

use App\Mail\BookingConfirmed;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;

class BookingObserver
{
    public function created(Booking $booking): void
    {
        Mail::to($booking->email)->send(new BookingConfirmed($booking));
    }
}
