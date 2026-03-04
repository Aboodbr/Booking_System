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

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return Room::with('hotel')->paginate($perPage);
    }

    /**
     * @param int $hotelId
     * @return Collection<int, Room>
     */
    public function getByHotelId(int $hotelId): Collection
    {
        return Room::where('hotel_id', $hotelId)->get();
    }

    /**
     * @param int $id
     * @return Room
     */
    public function findById(int $id): Room
    {
        return Room::findOrFail($id);
    }
}
