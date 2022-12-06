<?php

use App\Http\Controllers\CertificateController;
use App\Models\Certificate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

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
Route::get('/', function () {

    return view('welcome');
});

Route::resource('certificates', CertificateController::class);
Route::get('/screenshot',[CertificateController::class,'screenshot'])->name('screenshot');
Route::post('push-screenshot', [CertificateController::class,'push_screenshot'])->name('push.screenshot');


