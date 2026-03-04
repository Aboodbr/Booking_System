<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\PaypalController;

class RoomController extends Controller
{
    // Display all available rooms
    public function getall()
    {
        $hotel = Hotel::first();
        $rooms = Room::all();
        return view('home.rooms', compact('rooms','hotel'));
    }

    // Display a single room by its ID
    public function getone($id)
    {
        $room = Room::findOrFail($id);
        return view('home.single_room', compact('room'));
    }

    // Handle the booking request
    public function booking(BookingRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to book a room.');
        }

        $validated = $request->validated();

        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);

        // Ensure check_out is after check_in
        if ($checkOut->lte($checkIn)) {
            return redirect()->back()->withInput()->with('error', 'Check-out date must be after check-in date.');
        }

        $duration = $checkIn->diffInDays($checkOut);
        $room = Room::findOrFail($validated['room_id']);
        $hotel = $room->hotel;
        $pricePerNight = $room->price;
        $totalPrice = $duration * $pricePerNight;

        // Create booking
        $booking = Booking::create([
            'hotel_id'      => $hotel->id,
            'room_id'       => $validated['room_id'],
            'user_id'       => Auth::id(),
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'check_in'      => $validated['check_in'],
            'check_out'     => $validated['check_out'],
            'duration_days' => $duration,
            'price'         => $totalPrice,
            'status'        => 'pending',
            'payment_method'=> $request->payment_method,
        ]);

        // الدفع كاش
        if ($request->payment_method === 'cash') {
            
            return redirect()->route('payment.success', ['id' => $booking->id])
            ->with('success', 'Room booked successfully. Please pay upon arrival.');
        }


        // الدفع Paypal
        $paypalController = new PaypalController();
        $request->merge([
            'amount' => $totalPrice,
            'description' => 'Booking for ' . $room->name . ' (ID: ' . $booking->id . ')',
            'booking_id' => $booking->id,
        ]);

        return $paypalController->createPayment($request);
    }
}
