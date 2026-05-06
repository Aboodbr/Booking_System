<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository implements BookingRepositoryInterface
{
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getUserBookings(int $userId): Collection
    {
        return Booking::with(['hotel', 'room'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
