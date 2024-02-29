<?php

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
Route::get('/login', function () {
    return view('customer.login');
})->name('customer.login');
Route::get('/signup', function () {
    return view('customer.signup');
})->name('customer.signup');
Route::get('/logout', function () {
    return view('customer.logout');
})->name('customer.logout');
//LOGIN
//CUSTOMER

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
});
