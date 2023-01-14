<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\AdminControllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user/home', [UserController::class, 'home'])->name('user.home');

//email verification
Route::middleware('auth')->controller(VerificationController::class)->prefix('email')
->name('verification.')->group(function () {

    // verification notice
    Route::get('/verify', 'notice')->name('notice');

    // verification Handler
    Route::get('/verify/{id}/{hash}', 'verificationHandler')->middleware('signed')->name('verify');

    // Resend verification
    Route::post('/verification-notification', 'verificationResend')->middleware('throttle:6,1')->name('resend');

});


// admin routes

// Login
Route::prefix('admin')->group( function () {
    Route::get('/login', [AdminController::class, 'showLoginForm']);
    Route::post('/login', [AdminController::class, 'login']);
});


Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')
->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');

    // Category Routes
    Route::resource('/categories', CategoryController::class);
});