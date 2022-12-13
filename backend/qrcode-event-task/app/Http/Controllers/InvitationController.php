<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;


class InvitationController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('create_invitation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'conference_name' => 'required|string',
            'desc' => 'required|string',

        ])->validate();

        $slug = Str::slug($request->conference_name);

        $count = Invitation::where('slug', 'like', $slug . '%')->count();
        if ($count){
            $slug = $slug . '-' . $count;
        }
//        dd($slug);
        DB::beginTransaction();

        try {

            $invitation = Invitation::create([
                'conference_name' => $request->conference_name,
                'slug' => $slug,
                'desc' => $request->desc,
            ]);

            if ($request->has('album')) {
                foreach ($request->album as $file) {
                    $invitation->images()->create([
                        'path' => $file,
                        'feature' => 1
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return view('invitation_image', ['invitation' => $invitation]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invitation $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }

    public function add_image(Request $request)
    {
        return $request->file->store('logos', [
            'disk' => 'public'
        ]);
    }

    public function form_register($slug)
    {
        return view('form_register', compact('slug'));
    }

    public function store_form(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_mobile' => 'required',
            'slug' => 'required|string|exists:invitations,slug'

        ])->validate();
        $invitation = Invitation::whereSlug($request->slug)->first();

        form::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_mobile' => $request->user_mobile,
            'invitation_id' => $invitation->id,
        ]);
        return redirect()->back()->with('success', 'successfully submitted');
    }

    public function invitation_image()
    {

        return view('invitation_image');
    }
}
