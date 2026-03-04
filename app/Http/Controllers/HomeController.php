<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $rooms = Room::all();
        return view('home.index',compact('hotels','rooms'));
    }
    public function about()
    {
        return view('home.about');
    }
   
}
