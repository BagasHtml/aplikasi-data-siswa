<?php

use App\Http\Controllers\absensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\nilaiController;

// login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [authController::class, 'login'])->name('login');
    Route::post('/', [authController::class, 'prosesLogin'])->name('proses');

    //register
    Route::get('/register', [authController::class, 'register'])->name('register');
    Route::post('/register', [authController::class, 'prosesRegister'])->name('proses-register');
});

Route::middleware(['auth'])->group(function() {
    //dashboard
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    //logout
    Route::post('/logout', [siswaController::class, 'logout'])->name('logout');  
    
    //crud
    Route::get('/siswa', [siswaController::class, 'index'])->name("siswa");

    Route::get('/add', [siswaController::class, 'create'])->name("add");
    Route::post('/add', [siswaController::class, 'store'])->name("store");

    Route::delete('/delete/{id}/siswa', [siswaController::class, 'destroy'])->name("delete");

    Route::get('/edit/{id}/siswa', [siswaController::class, 'edit'])->name("edit");
    Route::put('/edit/{id}/siswa', [siswaController::class, 'update'])->name('update');

    //nilai
    Route::get('/nilai', [nilaiController::class, 'index'])->name('nilai');

    Route::get('/add/nilai', [nilaiController::class, 'create'])->name('tambah.nilai');
    Route::post('/add/nilai', [nilaiController::class, 'store'])->name('tambah');

    Route::get('/edit/{id}/nilai', [nilaiController::class, 'edit'])->name('edit.nilai');
    Route::put('/edit/{id}/nilai', [nilaiController::class, 'update'])->name('update.nilai');

    Route::delete('/delete/{id}/nilai', [nilaiController::class, 'destroy'])->name('hapus');

    // Absensi
    Route::get('/absensi/siswa', [AbsensiController::class, 'index'])->name('absensi');

    Route::put('/absensi/siswa', [absensiController::class, 'proses'])->name('proses.absensi');
});