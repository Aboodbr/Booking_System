<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class RoomRepository implements RoomRepositoryInterface
{
    /**
     * @return Collection<int, Room>
     */
    public function getAll(): Collection
    {
        return Cache::remember('rooms.all', 3600, function () {
            return Room::with('hotel')->get();
        });
    }

    public function getPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return Room::with('hotel')->paginate($perPage);
    }

    /**
     * @return Collection<int, Room>
     */
    public function getByHotelId(int $hotelId): Collection
    {

        return Room::with('hotel')->where('hotel_id', $hotelId)->get();
    }

    public function findById(int $id): Room
    {

        return Room::with('hotel')->findOrFail($id);
    }
}
