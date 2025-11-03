<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Kategori;
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
    Route::get('Admin/Buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('Admin/Buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('Admin/Buku/{id}/show', [BukuController::class, 'show'])->name('buku.show');
    Route::delete('Admin/Buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::post('Admin/Kategori',[KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('Admin/Kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('Admin/ManajemenAnggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('Admin/TambahAnggota', [AnggotaController::class, 'store'])->name('anggota.store');

    Route::get('Admin/Peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');


    Route::post('Auth/Logout', [AuthController::class, 'logout'])->name('auth.logout');
});
