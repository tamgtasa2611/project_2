<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLoginGuest;
use App\Http\Middleware\CheckLoginAdmin;

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

//GUEST---------------------------------------------------------
Route::get('/', function () {
    return view('guest.index');
})->name('guest.home');
Route::get('/home', function () {
    return view('guest.index');
})->name('guest.home');

Route::get('/contact', function () {
    return view('guest.contact');
})->name('guest.contact');

Route::get('/about', function () {
    return view('guest.about');
})->name('guest.about');

//LOGIN
Route::get('/login', [GuestController::class, 'login'])->name('guest.login');
Route::post('/login', [GuestController::class, 'loginProcess'])->name('guest.loginProcess');
Route::get('/signup', [GuestController::class, 'register'])->name('guest.register');
Route::post('/signup', [GuestController::class, 'registerProcess'])->name('guest.registerProcess');
Route::get('/logout', [GuestController::class, 'logout'])->name('guest.logout');
//LOGIN

//PROFILE
Route::middleware([CheckLoginGuest::class])->group(function () {
    Route::get('/profile', [GuestController::class, 'profile'])->name('guest.profile');
    Route::get('/editAccount', [GuestController::class, 'editAccount'])->name('guest.editAccount');
    Route::get('/changePassword', [GuestController::class, 'changePassword'])->name('guest.changePassword');
    Route::get('/myBooking', [GuestController::class, 'myBooking'])->name('guest.myBooking');
});
//PROFILE

//GUEST---------------------------------------------------------


//ADMIN---------------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::middleware([CheckLoginAdmin::class])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/roomTypes', [AdminController::class, 'roomTypes'])->name('admin.roomTypes');
        Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
        Route::get('/employees', [AdminController::class, 'employees'])->name('admin.employees');
        Route::get('/guests', [AdminController::class, 'guests'])->name('admin.guests');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::get('/ratings', [AdminController::class, 'ratings'])->name('admin.ratings');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    });

//    LOGIN
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginProcess'])->name('admin.loginProcess');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});
//ADMIN---------------------------------------------------------
