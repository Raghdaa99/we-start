<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
            'desc' => 'nullable|string',
            'price' => 'required',
            'price_special' => 'required',
            'images' => 'required|array',
//            'images.*' => 'image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()) {
            $request->merge(['slug' => Str::slug($request->name)]);
            $hotel = Hotel::create($request->all());
            if ($request->hasFile('images')) {
                $allowedfileExtension = ['jpeg', 'jpg', 'png'];
                $files = $request->file('images');
                foreach ($files as $file) {
                    $filename = time() . rand() . $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    if ($check) {
                        $file->move(public_path('/uploads'), $filename);
                        Image::create([
                            'path' => $filename,
                            'imageable_id' => $hotel->id,
                            'imageable_type' => Hotel::class
                        ]);

                    }else{
                        // Error
                    }
                }
            }
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public
    function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public
    function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', ['hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function update(Request $request, Hotel $hotel)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required',
            'price_special' => 'required',
            'images' => 'nullable',
        ]);
        if (!$validator->fails()) {
            $request->merge(['slug' => Str::slug($request->name)]);
            $hotel->update($request->all());
            if ($request->hasFile('images')) {
                $allowedfileExtension = ['jpeg', 'jpg', 'png'];
                $files = $request->file('images');
                foreach ($files as $file) {
                    $filename = time() . rand() . $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    if ($check) {
                        $file->move(public_path('/uploads'), $filename);
                        Image::create([
                            'path' => $filename,
                            'imageable_id' => $hotel->id,
                            'imageable_type' => Hotel::class
                        ]);

                    }
                }
            }

        } else {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function destroy(Hotel $hotel)
    {
        $isDeleted = $hotel->delete();
        if ($isDeleted) {
            foreach($hotel->images as $image) {
                File::delete(public_path('uploads/' . $image->path));
            }
            $hotel->images()->delete();
            return response()->json(['message' => 'Success Deleted'],Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Delete failed'],Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        $isDeleted = $image->delete();
        File::delete(public_path('uploads/' . $image->path));
        return response()->json(
            ['message' => $isDeleted ? 'Success Deleted ' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
