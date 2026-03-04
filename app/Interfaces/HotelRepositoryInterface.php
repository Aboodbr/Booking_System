<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

interface HotelRepositoryInterface
{
    /**
     * @return Collection<int, Hotel>
     */
    public function getAll(): Collection;

    /**
     * @return Hotel|null
     */
    public function getFirst(): ?Hotel;

    /**
     * @param int $id
     * @return Hotel
     */
    public function findById(int $id): Hotel;
}
