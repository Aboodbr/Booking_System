<?php

declare(strict_types=1);

namespace App\DTOs;

use Illuminate\Http\Request;

class BookingDTO
{
    public readonly int $room_id;
    public readonly int $hotel_id;
    public readonly int $user_id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $phone;
    public readonly string $check_in;
    public readonly string $check_out;
    public readonly string $payment_method;

    public function __construct(
        int $room_id,
        int $hotel_id,
        int $user_id,
        string $name,
        string $email,
        string $phone,
        string $check_in,
        string $check_out,
        string $payment_method
    ) {
        $this->room_id = $room_id;
        $this->hotel_id = $hotel_id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->payment_method = $payment_method;
    }

    public static function fromRequest(Request $request, int $userId, int $hotelId): self
    {
        return new self(
            (int) $request->input('room_id'),
            $hotelId,
            $userId,
            $request->input('name'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('check_in'),
            $request->input('check_out'),
            $request->input('payment_method')
        );
    }
}
