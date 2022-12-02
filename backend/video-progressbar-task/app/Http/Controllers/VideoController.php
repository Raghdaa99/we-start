<?php

namespace App\Http\Controllers;

use App\Jobs\VideoProgress;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('welcome',compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp4,mov,ogg,qt',
        ]);

        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('uploads'), $name);

        $data['title'] = $request->title;
        $data['url'] = $name;

//        dd($data);
        VideoProgress::dispatch($data);

        return response()->json(['success' => 'Successfully uploaded.']);
    }

}
