<?php


use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontsite.index');
});

Route::group([
    'prefix' => '/dashboard',
    'as' => 'admin.',
    'middleware' => ['auth:admin'],
], function () {

     Route::get('/', [AdminController::class, 'index'])->name('admin.home');

     Route::resource('categories', CategoryController::class);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

 Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });


Route::prefix('/user')->name('user.')->middleware('auth')->group(function () {

    Route::get('/dashboard',[FreelancerController::class,'index'])->name('dashboard');
    Route::get('/settings',[FreelancerController::class,'settings'])->name('settings');
    Route::put('/settings',[FreelancerController::class,'save_settings'])->name('settings.save');

    Route::resource('projects', ProjectController::class);
});


//require __DIR__.'/auth.php';
