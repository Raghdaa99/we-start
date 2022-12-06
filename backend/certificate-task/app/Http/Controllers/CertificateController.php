<?php

namespace App\Http\Controllers;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;

class CertificateController extends Controller
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
        return view('add-certificate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'title' => 'required',
            'no_hours' => 'required|numeric',
            'end_date' => 'required',
        ]);

        $data = $request->all();
        $certificate = Certificate::create($data);

        return $this->screenshot($certificate->id);

//        return redirect()->back()->with('success', 'Certificate is successfully created and sent to your email as pdf');
    }

    public function screenshot($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('certificate-png', compact('certificate'));
    }

    public function push_screenshot(Request $request)
    {
        $certificate = Certificate::findOrFail($request->certificate_id);
        $base64_image = $request->image;

        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
            $data = substr($base64_image, strpos($base64_image, ',') + 1);
            $data = base64_decode($data);
            $imageName = rand() . '.' . 'png';
            Storage::put('public/imgs/' . $imageName, $data);
        }

        $pdf = PDF::loadView('certificate-pdf3', ['certificate' => $certificate])
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        $fileName = $certificate->title . rand() . '.' . 'pdf';
        Storage::put('public/pdf/' . $fileName, $pdf->output());

        $certificate->pdf = $fileName;
        $certificate->image = $imageName;
        $certificate->save();
//
        $data = [];
        $data['username'] = $certificate->username;
        $data['title'] = $certificate->title;
        $data['no_hours'] = $certificate->no_hours;
        $data['pdf'] = $fileName;
        $data['image'] = $imageName;
//        dd($data);
        Mail::to('raghdaa.s.abueida@gmail.com')->queue(new CertificateMail($data));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
