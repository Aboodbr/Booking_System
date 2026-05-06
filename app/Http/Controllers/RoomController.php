<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\BookingDTO;
use App\Http\Requests\BookingRequest;
use App\Interfaces\HotelRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    private HotelRepositoryInterface $hotelRepository;

    private RoomRepositoryInterface $roomRepository;

    private BookingService $bookingService;

    public function __construct(
        HotelRepositoryInterface $hotelRepository,
        RoomRepositoryInterface $roomRepository,
        BookingService $bookingService
    ) {
        $this->hotelRepository = $hotelRepository;
        $this->roomRepository = $roomRepository;
        $this->bookingService = $bookingService;
    }

    // Display all available rooms
    public function getall()
    {
        $hotel = Cache::remember('first_hotel', 3600, fn () => $this->hotelRepository->getFirst());
        $rooms = Cache::remember('all_rooms', 3600, fn () => $this->roomRepository->getAll());

        return view('home.rooms', compact('rooms', 'hotel'));
    }

    // Display a single room by its ID
    public function getone(int $id)
    {
        $room = $this->roomRepository->findById($id);

        return view('home.single_room', compact('room'));
    }

    // Handle the booking request
    public function booking(BookingRequest $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to book a room.');
        }

        $room = $this->roomRepository->findById((int) $request->input('room_id'));
        $hotelId = $room->hotel_id;

        $dto = BookingDTO::fromRequest($request, Auth::id(), $hotelId);

        try {
            return $this->bookingService->processBooking($dto, (float) $room->price, $request);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
