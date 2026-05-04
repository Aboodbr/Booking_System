<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // الكل يقدر يشوف القائمة
    }

    public function view(User $user, Booking $booking): bool
    {
        return $user->role === 'admin'
            || $user->id === $booking->user_id;
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'user';
    }

    public function update(User $user, Booking $booking): bool
    {
        return $user->role === 'admin'
            || $user->id === $booking->user_id;
    }

    public function delete(User $user, Booking $booking): bool
    {
        return $user->role === 'admin'
            || $user->id === $booking->user_id;
    }

    public function restore(User $user, Booking $booking): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Booking $booking): bool
    {
        return $user->role === 'admin';
    }
}
