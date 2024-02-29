<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//CUSTOMER
Route::get('/', function () {
    return view('customer.index');
})->name('customer.home');
Route::get('/home', function () {
    return view('customer.index');
})->name('customer.home');

Route::get('/contact', function () {
    return view('customer.contact');
})->name('customer.contact');

Route::get('/about', function () {
    return view('customer.about');
})->name('customer.about');

//LOGIN
Route::get('/login', [UserController::class, 'login'])->name('customer.login');
Route::post('/login', [UserController::class, 'loginProcess'])->name('customer.loginProcess');
Route::get('/signup', [UserController::class, 'register'])->name('customer.register');
Route::post('/signup', [UserController::class, 'registerProcess'])->name('customer.registerProcess');
Route::get('/logout', [UserController::class, 'logout'])->name('customer.logout');
//LOGIN

Route::get('/profile', [UserController::class, 'setting'])->name('customer.profile');
Route::get('/editAccount', [UserController::class, 'setting'])->name('customer.editAccount');
Route::get('/changePassword', [UserController::class, 'setting'])->name('customer.changePassword');
Route::get('/myBooking', [UserController::class, 'setting'])->name('customer.myBooking');

//CUSTOMER

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
});
