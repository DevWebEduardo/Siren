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

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::Class, 'home']);
Route::get('/login', [HomeController::Class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [HomeController::Class, 'register'])->middleware('guest');
Route::get('/dashboard', [HomeController::Class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/user/profile', [HomeController::Class, 'account'])->middleware('auth');
Route::get('/ad/create', [HomeController::Class, 'create'])->middleware('auth');
Route::POST('/ad', [HomeController::class, 'create'])->middleware('auth');

// Route::get('/forgot-password', [HomeController::Class, 'password_request']);



