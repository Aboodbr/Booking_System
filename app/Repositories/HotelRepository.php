<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\HotelRepositoryInterface;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class HotelRepository implements HotelRepositoryInterface
{
    /**
     * @return Collection<int, Hotel>
     */
    public function getAll(): Collection
    {
        return Cache::remember('hotels.all', 3600, function () {
            return Hotel::with('rooms')->get();
        });
    }

    public function getFirst(): ?Hotel
    {
        return Cache::remember('hotel.first', 3600, function () {
            return Hotel::with('rooms')->first();
        });
    }

    public function findById(int $id): Hotel
    {
        return Hotel::with('rooms')->findOrFail($id);
    }
}
