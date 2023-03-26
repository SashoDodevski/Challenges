<?php

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\VehicleApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [UserApiController::class, 'register']);
Route::post('login', [UserApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create-token', [VehicleApiController::class, 'createToken']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/vehicles', [VehicleApiController::class, 'index']);
    Route::post('/vehicles', [VehicleApiController::class, 'store']);
    Route::put('/vehicles/{vehicle}', [VehicleApiController::class, 'update']);
    Route::delete('/vehicles/{vehicle}', [VehicleApiController::class, 'destroy']);
});
