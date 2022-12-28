<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('/logout', [AuthController::class, 'logout']);

    });

    Route::get('/categories' , [SiteController::class,'getAllCategories']);
    Route::get('/products' , [SiteController::class,'getAllProducts']);
    Route::get('/product/{slug}', [SiteController::class,'getProduct']);

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login ', [AuthController::class, 'login']);
});
