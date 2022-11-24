<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FrontSiteController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [CalendarController::class,'index'])->name('dashboard');

Route::resource('hotels',HotelController::class);
Route::resource('bookings',BookingController::class);
Route::delete('/image/{id}',[HotelController::class,'deleteImage'])->name('delete_Image');

Route::get('/',[FrontSiteController::class,'index'])->name('home');
Route::get('/details/{id}',[FrontSiteController::class,'details'])->name('details');
