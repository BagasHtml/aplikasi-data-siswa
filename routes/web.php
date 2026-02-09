<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\authController;

// login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [authController::class, 'login'])->name('login');
    Route::post('/', [authController::class, 'prosesLogin'])->name('proses');
});

// Crud
Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [siswaController::class, 'index'])->name("siswa");
    Route::get('/add', [siswaController::class, 'create'])->name("add");
    Route::post('/add', [siswaController::class, 'store'])->name("store");
    Route::post('/delete/{id}/siswa', [siswaController::class, 'destroy'])->name("delete");
    Route::get('/edit/{id}/siswa', [siswaController::class, 'edit'])->name("edit");
    Route::put('/edit/{id}/siswa', [siswaController::class, 'update'])->name('update');
});