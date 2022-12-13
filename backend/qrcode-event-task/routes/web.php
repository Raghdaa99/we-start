<?php

use App\Http\Controllers\InvitationController;
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

Route::get('/', [InvitationController::class, 'create'])->name('invitations.create');
Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');
Route::get('/register/{slug}',[InvitationController::class, 'form_register'])->name('form_register');
Route::post('/form_register',[InvitationController::class, 'store_form'])->name('form_register.store');
Route::get('/invitation_image',  [InvitationController::class, 'invitation_image']);
Route::post('add-new-image', [InvitationController::class, 'add_image'])->name('add_image');
