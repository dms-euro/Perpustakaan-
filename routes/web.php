<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class, 'index'])->name('homepage');

Route::get('Auth/Login', [AuthController::class, 'index'])->name('login');

Route::post('Auth/Login', [AuthController::class, 'login'])->name('auth.login');
Route::get('Auth/Register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('Dashboard/Admin', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/Buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/Buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/Buku/export', [BukuController::class, 'export'])->name('buku.export');
    Route::post('/Buku/import', [BukuController::class, 'import'])->name('buku.import');
    Route::delete('/Buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::delete('/Kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/Akun', [AccountController::class, 'index'])->name('akun.index');
    Route::post('/Akun/tambah', [AccountController::class, 'store'])->name('akun.store');
    Route::get('/Akun/{id}/edit', [AccountController::class, 'edit'])->name('akun.edit');
    Route::put('/Akun/{id}/update', [AccountController::class, 'update'])->name('akun.update');
    Route::get('/Akun/{id}/show', [AccountController::class, 'show'])->name('akun.show');
    Route::delete('/Akun/{id}/delete', [AccountController::class, 'destroy'])->name('akun.destroy');

    Route::get('/Aktivitas', [LogController::class, 'index'])->name('aktivitas.index');
    Route::get('/aktivitas/{id}', [LogController::class, 'show']);
    Route::get('/aktivitas/export/excel', [LogController::class, 'exportExcel'])->name('aktivitas.export.excel');

});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/Peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/Peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/Peminjaman/{id}/show', [PeminjamanController::class, 'show'])->name('peminjaman.show');
    Route::post('/Peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
});

Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/Profil', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/Buku', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/Buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/Buku/{id}/show', [BukuController::class, 'show'])->name('buku.show');

    Route::post('Kategori', [KategoriController::class, 'store'])->name('kategori.store');

    Route::post('/Auth/Logout', [AuthController::class, 'logout'])->name('auth.logout');
});
