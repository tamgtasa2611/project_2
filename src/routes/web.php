<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GuestController as AdminGuestController;
use App\Http\Controllers\Admin\RoomTypeController as AdminRoomTypeController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\GuestController;
use App\Http\Middleware\CheckLoginAdmin;
use App\Http\Middleware\CheckLoginGuest;
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

//LOGIN REGISTER LOGOUT
Route::get('/login', [GuestController::class, 'login'])->name('guest.login');
Route::post('/login', [GuestController::class, 'loginProcess'])->name('guest.loginProcess');
Route::get('/signup', [GuestController::class, 'register'])->name('guest.register');
Route::post('/signup', [GuestController::class, 'registerProcess'])->name('guest.registerProcess');
Route::get('/logout', [GuestController::class, 'logout'])->name('guest.logout');
//LOGIN REGISTER LOGOUT

//PROFILE
Route::middleware([CheckLoginGuest::class])->group(function () {
    Route::get('/profile', [GuestController::class, 'profile'])->name('guest.profile');
    Route::get('/editAccount', [GuestController::class, 'editAccount'])->name('guest.editAccount');
    Route::put('/editAccount', [GuestController::class, 'updateAccount'])->name('guest.updateAccount');
    Route::get('/changePassword', [GuestController::class, 'changePassword'])->name('guest.changePassword');
    Route::get('/myBooking', [GuestController::class, 'myBooking'])->name('guest.myBooking');
});
//PROFILE

//GUEST---------------------------------------------------------


//ADMIN---------------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::middleware([CheckLoginAdmin::class])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        //    DASHBOARD
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        });

        // ROOM TYPES
        Route::prefix('roomTypes')->group(function () {
            Route::get('/', [AdminRoomTypeController::class, 'index'])->name('admin.roomTypes');
            Route::get('/create', [AdminRoomTypeController::class, 'create'])->name('admin.roomTypes.create');
            Route::post('/create', [AdminRoomTypeController::class, 'store'])->name('admin.roomTypes.store');
            Route::get('/{roomType}/edit', [AdminRoomTypeController::class, 'edit'])->name('admin.roomTypes.edit');
            Route::put('/{roomType}/edit', [AdminRoomTypeController::class, 'update'])->name('admin.roomTypes.update');
            Route::delete('/{roomType}', [AdminRoomTypeController::class, 'destroy'])->name('admin.roomTypes.destroy');
            // PDF
            Route::get('downloadPdf', [AdminRoomTypeController::class, 'downloadPDF'])->name('admin.roomTypes.downloadPdf');
        });

        // ROOMS
        Route::prefix('rooms')->group(function () {
            Route::get('/', [AdminController::class, 'rooms'])->name('admin.rooms');
        });

        // EMPLOYEES
        Route::prefix('employees')->group(function () {
            Route::get('/', [AdminEmployeeController::class, 'index'])->name('admin.employees');
            Route::get('/create', [AdminEmployeeController::class, 'create'])->name('admin.employees.create');
            Route::post('/create', [AdminEmployeeController::class, 'store'])->name('admin.employees.store');
            Route::get('/{employee}/edit', [AdminEmployeeController::class, 'edit'])->name('admin.employees.edit');
            Route::put('/{employee}/edit', [AdminEmployeeController::class, 'update'])->name('admin.employees.update');
            Route::delete('/{employee}', [AdminEmployeeController::class, 'destroy'])->name('admin.employees.destroy');
            // PDF
            Route::get('downloadPdf', [AdminEmployeeController::class, 'downloadPDF'])->name('admin.employees.downloadPdf');
        });

        // GUESTS
        Route::prefix('guests')->group(function () {
            Route::get('/', [AdminGuestController::class, 'index'])->name('admin.guests');
            Route::get('/create', [AdminGuestController::class, 'create'])->name('admin.guests.create');
            Route::post('/create', [AdminGuestController::class, 'store'])->name('admin.guests.store');
            Route::get('/{guest}/edit', [AdminGuestController::class, 'edit'])->name('admin.guests.edit');
            Route::put('/{guest}/edit', [AdminGuestController::class, 'update'])->name('admin.guests.update');
            Route::delete('/{guest}', [AdminGuestController::class, 'destroy'])->name('admin.guests.destroy');
            // PDF
            Route::get('downloadPdf', [AdminGuestController::class, 'downloadPDF'])->name('admin.guests.downloadPdf');
        });

        // BOOKINGs
        Route::prefix('bookings')->group(function () {
            Route::get('/', [AdminController::class, 'bookings'])->name('admin.bookings');
        });

        // SERVICES
        Route::prefix('services')->group(function () {
            Route::get('/', [AdminController::class, 'services'])->name('admin.services');
        });

        // RATINGS
        Route::prefix('ratings')->group(function () {
            Route::get('/', [AdminController::class, 'ratings'])->name('admin.ratings');
        });

        // SETTINGS
        Route::prefix('settings')->group(function () {
            Route::get('/', [AdminController::class, 'settings'])->name('admin.settings');
        });
    });

    //    LOGIN
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'loginProcess'])->name('admin.loginProcess');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
//ADMIN---------------------------------------------------------
