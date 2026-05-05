<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\HotelRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;

class HomeController extends Controller
{
    private HotelRepositoryInterface $hotelRepository;

    private RoomRepositoryInterface $roomRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository, RoomRepositoryInterface $roomRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->roomRepository = $roomRepository;
    }

    public function index()
    {
        $hotels = $this->hotelRepository->getAll();
        $rooms = $this->roomRepository->getAll();

        return view('home.index', compact('hotels', 'rooms'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
