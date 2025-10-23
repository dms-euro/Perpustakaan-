<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('Auth/Login', [AuthController::class, 'index'])->name('auth.index');
Route::post('Auth/Login', [AuthController::class, 'login'])->name('auth.login');
Route::get('Auth/Register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth'])->group(function () {
    Route::get ('Dashboard/Admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('Auth/Logout', [AuthController::class, 'logout'])->name('auth.logout');
});
