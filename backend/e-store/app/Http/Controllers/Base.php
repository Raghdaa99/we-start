<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Base extends Controller
{
    public static function msg($status, $msg = '', $code = 200, $data = '')
    {
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ], $code);
    }
}
