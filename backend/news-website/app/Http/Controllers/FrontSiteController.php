<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function index()
    {
        return view('frontsite.index');
    }

    public function category()
    {
        return view('frontsite.category');
    }

    public function contact()
    {
        return view('frontsite.contact');
    }

    public function about()
    {
        return view('frontsite.about');
    }

    public function details()
    {
        return view('frontsite.details');
    }
}
