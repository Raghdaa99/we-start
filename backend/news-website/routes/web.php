<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\FrontSiteController;
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


Route::get('/',[FrontSiteController::class,'index'])->name('home');
Route::get('/category',[FrontSiteController::class,'category'])->name('category');
Route::get('/contact',[FrontSiteController::class,'contact'])->name('contact');
Route::get('/about',[FrontSiteController::class,'about'])->name('about');
Route::get('/details',[FrontSiteController::class,'details'])->name('details');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});
