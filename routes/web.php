<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::redirect("/", '/dashboard');

Route::middleware(['auth'])->group(function () {
   
   
   Route::get('dashboard', [DashboardController::class, 'index'])->name('page.dashboard');
   
   Route::resource('car', CarController::class);
   Route::resource('rentals', RentalController::class);
});

// Route::get('cars', [CarController::class, 'index']);

 

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register',  [AuthController::class, 'registerPage'])->name('register');
Route::post('/register',  [AuthController::class, 'register'])->name('register.post');





