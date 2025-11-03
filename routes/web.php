<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('Auth/Login', [AuthController::class, 'index'])->name('auth.index');
Route::get('/login', function () {
    return redirect()->route('auth.index');
})->name('login');

Route::post('Auth/Login', [AuthController::class, 'login'])->name('auth.login');
Route::get('Auth/Register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth'])->group(function () {
    Route::get('Dashboard/Admin', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('Admin/Buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('Admin/Buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('Admin/Buku/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::delete('Admin/Buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::post('Admin/Kategori',[KategoriController::class, 'store'])->name('kategori.store');

    Route::get('Admin/ManajemenAnggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('Admin/TambahAnggota', [AnggotaController::class, 'store'])->name('anggota.store');

    Route::post('Auth/Logout', [AuthController::class, 'logout'])->name('auth.logout');
});
