<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ForumController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    Route::get('forums', [ForumController::class, 'index'])->name('forums.index');
    Route::get('forums/create', [ForumController::class, 'create'])->name('forums.create');
    Route::get('forums/pending', [ForumController::class, 'pending'])->name('forums.pending');
    Route::post('forums/approveForum/{forum}', [ForumController::class, 'approveForum'])->name('forums.approveForum');
    Route::post('forums', [ForumController::class, 'store'])->name('forums.store');
    Route::get('forums/{forum}/edit', [ForumController::class, 'edit'])->name('forums.edit');
    Route::put('forums/{forum}', [ForumController::class, 'update'])->name('forums.update');
    Route::delete('forums/{forum}', [ForumController::class, 'destroy'])->name('forums.destroy');
    
    Route::get('forums/{forum}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('forums/{forum}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('forums/{forum}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('forums/{forum}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('forums/{forum}', [ForumController::class, 'show'])->name('forums.show');



require __DIR__.'/auth.php';
