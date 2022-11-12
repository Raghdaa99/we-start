<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
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


    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('invoices',InvoiceController::class);
    Route::get('/pdf-invoice3/{invoice}',[InvoiceController::class,'pdf'])->name('invoiceFile.pdf');
    Route::get('/print-invoice/{invoice}',[InvoiceController::class,'print'])->name('invoice.print');


