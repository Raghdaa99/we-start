<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate();
        return view('front.rooms', ['hotels' => $hotels]);
    }

    public function details($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('front.room-details', ['hotel'=>$hotel]);
    }
}
