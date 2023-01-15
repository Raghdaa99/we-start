<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function index()
    {
        return view('frontsite.dashboard-user.index');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('frontsite.dashboard-user.settings', [
            'user' => $user,
            'profile' => $user->profile,
        ]);
    }

    public function save_settings(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'profile_photo' => [
                'nullable',
                'mimes:jpg,jpeg',
                'dimensions:min_with=200,min_height=200,max_height=1000,max_width=1000',
            ],
        ]);

        $user = Auth::user();
        // $old_photo = $user->image->path;

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filepath = $file->store('profile-photos', [
                'disk' => 'public'
            ]);



            $user->image()->create([
                'path' => $filepath,
                'feature' => 1
            ]);
        }

        $user->type = $request->type;
        $user->save();
        $isUpdate = $user->profile()->updateOrCreate([], $request->all());

        $user->forceFill([
            'name' => $request->first_name . ' ' . $request->last_name,
        ])->save();

        return response()->json(
            ['message' => $isUpdate ? 'Profile updated' : 'failed!'],
            $isUpdate ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );


    }
}
