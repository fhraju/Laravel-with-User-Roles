<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::post('/login/custom', [LoginController::class, 'loginCustom'])->name('login.custom');

// user routes
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
});

// admin routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
});