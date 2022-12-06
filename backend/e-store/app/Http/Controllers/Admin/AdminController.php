<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function admins()
    {
        return view('admin.admins');
    }

    public function payments()
    {
        return view('admin.payments');
    }

    public function customers()
    {
        return view('admin.customers');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function settings_data()
    {
//        return view('admin.index');
    }


}
