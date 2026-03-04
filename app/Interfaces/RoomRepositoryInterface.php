<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RoomRepositoryInterface
{
    /**
     * @return Collection<int, Room>
     */
    public function getAll(): Collection;

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginated(int $perPage = 15): LengthAwarePaginator;

    /**
     * @param int $hotelId
     * @return Collection<int, Room>
     */
    public function getByHotelId(int $hotelId): Collection;

    /**
     * @param int $id
     * @return Room
     */
    public function findById(int $id): Room;
}
