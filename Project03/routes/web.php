<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\DownloadFileController;

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
Route::get('/', function(){
    return redirect('login');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'destroy'])->name('logout');



Route::middleware('admin')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('applications/active', [ApplicationController::class, 'active']);
    Route::get('applications/archived', [ApplicationController::class, 'archived']);
    Route::get('applications/archivedApplications', [ApplicationController::class, 'archivedApplications'])->name('applications.archivedApplications');
    Route::resource('applications', ApplicationController::class);
    Route::get('applications/{application}/makeDonation/{id}', [ApplicationController::class, 'makeDonation']);


    Route::get('contacts/active', [ContactController::class, 'active']);
    Route::get('contacts/archived', [ContactController::class, 'archived']);
    Route::get('contacts/archivedContacts', [ContactController::class, 'archivedContacts'])->name('contacts.archivedContacts');
    Route::resource('contacts', ContactController::class);

    Route::get('volunteers/requests', [VolunteerController::class, 'requests']);
    Route::get('volunteers/volunteers', [VolunteerController::class, 'volunteers']);
    Route::get('volunteers/activeVolunteers', [VolunteerController::class, 'activeVolunteers'])->name('volunteers.activeVolunteers');
    Route::resource('volunteers', VolunteerController::class);

    Route::get('donations/allDonations', [DonationController::class, 'allDonations']);
    Route::resource('donations', DonationController::class);

    Route::resource('partners', PartnerController::class);

    Route::resource('blogCategories', BlogCategoryController::class);

    Route::resource('blogs', BlogController::class);

    Route::resource('videos', VideoController::class);

    Route::get('storage/{file_path}')->name('downloadFile');
});
