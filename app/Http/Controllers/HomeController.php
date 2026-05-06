<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\HotelRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;
use Illuminate\Support\Facades\Cache;

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
        // استخدام الكاش لمدة 60 دقيقة (3600 ثانية)
        $hotels = Cache::remember('home_hotels', 3600, function () {
            return $this->hotelRepository->getAll();
        });

        $rooms = Cache::remember('home_rooms', 3600, function () {
            return $this->roomRepository->getAll();
        });

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
