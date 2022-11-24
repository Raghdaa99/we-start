<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        $events[] = [];
        $bookings = Booking::all();
        foreach ($bookings as $booking) {
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->hotel->name.'- price:$'. $booking->price_total,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => sprintf('#%06X', mt_rand(0xFF9999, 0xFFFF00)),
                'allDay'=>true
            ];
        }
        return view('admin.dashboard', ['events' => $events]);
    }


}
