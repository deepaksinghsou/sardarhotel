<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function rooms()
    {
        return view('hotel.room.index');
    }
}