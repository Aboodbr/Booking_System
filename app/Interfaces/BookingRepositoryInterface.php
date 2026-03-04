<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    /**
     * @param array $data
     * @return Booking
     */
    public function create(array $data): Booking;

    /**
     * @param int $userId
     * @return Collection<int, Booking>
     */
    public function getUserBookings(int $userId): Collection;
}
