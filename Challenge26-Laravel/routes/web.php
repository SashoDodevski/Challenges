<?php

use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('teams', [TeamController::class, 'store'])->name('teams.store')->middleware('admin');
    Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create')->middleware('admin');
    Route::get('teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit')->middleware('admin');
    Route::put('teams/{team}', [TeamController::class, 'update'])->name('teams.update')->middleware('admin');
    Route::delete('teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy')->middleware('admin');
    
    Route::get('players', [PlayerController::class, 'index'])->name('players.index');
    Route::post('players', [PlayerController::class, 'store'])->name('players.store')->middleware('admin');
    Route::get('players/create', [PlayerController::class, 'create'])->name('players.create')->middleware('admin');
    Route::get('players/{player}', [PlayerController::class, 'show'])->name('players.show');
    Route::get('players/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit')->middleware('admin');
    Route::put('players/{player}', [PlayerController::class, 'update'])->name('players.update')->middleware('admin');
    Route::delete('players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy')->middleware('admin');
    
    Route::get('football_matches', [FootballMatchController::class, 'index'])->name('football_matches.index');
    Route::post('football_matches', [FootballMatchController::class, 'store'])->name('football_matches.store')->middleware('admin');
    Route::get('football_matches/create', [FootballMatchController::class, 'create'])->name('football_matches.create')->middleware('admin');
    Route::get('football_matches/{football_match}', [FootballMatchController::class, 'show'])->name('football_matches.show');
    Route::get('football_matches/{football_match}/edit', [FootballMatchController::class, 'edit'])->name('football_matches.edit')->middleware('admin');
    Route::put('football_matches/{football_match}', [FootballMatchController::class, 'update'])->name('football_matches.update')->middleware('admin');
    Route::delete('football_matches/{football_match}', [FootballMatchController::class, 'destroy'])->name('football_matches.destroy')->middleware('admin');
});

require __DIR__ . '/auth.php';
