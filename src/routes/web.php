<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Middleware\CheckLoginGuest;

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

//CUSTOMER---------------------------------------------------------
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

//CUSTOMER---------------------------------------------------------


//ADMIN---------------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
});
//ADMIN---------------------------------------------------------
