<?php

use App\Http\Controllers\CarApiController;
use App\Http\Controllers\SalonApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('cars', CarApiController::class, [
    'middleware' => 'shield'
]);

Route::middleware('salon')->get('/salons', [SalonApiController::class, 'index']);
