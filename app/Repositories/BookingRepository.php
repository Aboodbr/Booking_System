<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository implements BookingRepositoryInterface
{
    /**
     * @param array $data
     * @return Booking
     */
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    /**
     * @param int $userId
     * @return Collection<int, Booking>
     */
    public function getUserBookings(int $userId): Collection
    {
        return Booking::where('user_id', $userId)->get();
    }
}
