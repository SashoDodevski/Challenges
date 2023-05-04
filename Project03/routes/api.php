<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\VideoApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\PartnerApiController;
use App\Http\Controllers\Api\StatisticApiController;
use App\Http\Controllers\Api\VolunteerApiController;
use App\Http\Controllers\Api\ApplicationApiController;
use App\Http\Controllers\Api\BlogCategoryApiController;
use App\Http\Controllers\Api\VolunteerPositionsApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserApiController::class, 'register']);
Route::post('login', [UserApiController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/contacts', [ContactApiController::class, 'store']);
    Route::get('/contacts/{contact}', [ContactApiController::class, 'show']);

    Route::post('/applications', [ApplicationApiController::class, 'store']);
    Route::get('/applications/{application}', [ApplicationApiController::class, 'show']);

    Route::post('/volunteers', [VolunteerApiController::class, 'store']);
    Route::get('/volunteers/{volunteer}', [VolunteerApiController::class, 'show']);
    
    Route::get('/blogs', [BlogApiController::class, 'index']);
    Route::post('/blogs', [BlogApiController::class, 'store']);
    Route::get('/blogs/{blog}', [BlogApiController::class, 'show']);  

    Route::get('/blogCategories', [BlogCategoryApiController::class, 'index']);

    Route::get('/partners', [PartnerApiController::class, 'index']);
    
    Route::get('/videos', [VideoApiController::class, 'index']);
    Route::post('/videos', [VideoApiController::class, 'store']);
    Route::get('/videos/{video}', [VideoApiController::class, 'show']);

    Route::get('/volunteerPositions', [VolunteerPositionsApiController::class, 'index']);

    Route::get('/statistics', [StatisticApiController::class, 'index']);
});
