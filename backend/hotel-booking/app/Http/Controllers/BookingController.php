<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookingRequest $request)
    {
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $hotel_id = $request->hotel_id;


        $conflict = Booking::where('hotel_id',$hotel_id ) // لفحص اذا كان هذا الشاليه تم حجزه مسبقا
            ->whereDate('start_date', '<=', $start_date)
            ->whereDate('end_date', '>=', $start_date)
//            ->whereDate('start_date', '<=', $end_date)
//            ->whereDate('end_date', '<=', $end_date)
            ->exists();


        if (!$conflict) {
            $no_days = $end_date->diff($start_date)->format("%a"); // ضرب عدد الايام في سعر كل ليلة
            $hotel = Hotel::findOrFail($hotel_id);
            $price = $hotel->price;
            $start_day = $start_date->format('l');
            if ($start_day == "Thursday" || $start_day == "Friday") {
                $price += $hotel->price_special; // اذا كان يوم الحجز الخميس او الجمعة زيادة سعر خاص
            }
            $booking = Booking::create([
                'hotel_id' => $hotel_id,
                'user_name' => $request->user_name,
                'user_mobile' => $request->user_mobile,
                'user_email' => $request->user_email,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'number_guests' => $request->number_guests,
                'price_total' => $no_days * $price,
                'notes' => $request->notes,
            ]);

            return redirect()
                ->route('details', $hotel_id)
                ->with('success', "Hotel success Booked");

        }

        return redirect()
            ->route('details', $hotel_id)
            ->with('error', "Sorry , Hotel is Booked by someone , Choose other Day !!!");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
