<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\HotelRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;

class HotelController extends Controller
{
    private HotelRepositoryInterface $hotelRepository;
    private RoomRepositoryInterface $roomRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository, RoomRepositoryInterface $roomRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->roomRepository = $roomRepository;
    }

    public function showRooms(int $id)
    {
        $hotel = $this->hotelRepository->findById($id);
        $rooms = $this->roomRepository->getByHotelId($id);

        return view('home.rooms', compact('rooms', 'hotel'));
    }
}
