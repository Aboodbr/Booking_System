<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function showRooms($id)
{
    $hotel = Hotel::findOrFail($id);
    $rooms = Room::where('hotel_id', $id)->get();

    return view('home.rooms', compact('rooms', 'hotel'));
}

}
