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
Route::get('/category/{slug?}',[FrontSiteController::class,'category'])->name('category');
Route::get('/contact',[FrontSiteController::class,'contact'])->name('contact');
Route::get('/about',[FrontSiteController::class,'about'])->name('about');
Route::get('/search-posts',[FrontSiteController::class,'search_posts'])->name('search');
Route::get('/details/{post_id}',[FrontSiteController::class,'details'])->name('details');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
//    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore')->withTrashed();
    Route::get('categories/{category}/forceDelete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete')->withTrashed();
    Route::resource('categories', CategoryController::class);


    Route::get('posts/trash', [PostController::class, 'trash'])->name('posts.trash');
    Route::get('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore')->withTrashed();
    Route::get('posts/{post}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete')->withTrashed();
    Route::resource('posts', PostController::class);

});
