<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register',  [AuthController::class, 'registerPage'])->name('register');
Route::post('/register',  [AuthController::class, 'register'])->name('register.post');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('page.dashboard');

Route::get('/car', [CarController::class, 'index'])->name('page.carList');
// Route::get('/car', [CarController::class, 'create'])->name('page.addCar');
// Route::post('/car', [CarController::class, 'create'])->name('page.addCar');
// Route::post('/car', [CarController::class, 'store'])->name('page.post');