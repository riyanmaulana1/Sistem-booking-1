<?php

use App\Http\Controllers\Auth\PengelolaLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login admin dan instansi (E2-02, E2-03)
Route::prefix('pengelola')->group(function () {
    Route::middleware('guest:admin,instansi')->group(function () {
        Route::get('masuk', [PengelolaLoginController::class, 'create'])->name('pengelola.masuk');
        Route::post('masuk', [PengelolaLoginController::class, 'store'])->middleware('throttle:5,1');
    });

    Route::post('keluar', [PengelolaLoginController::class, 'destroy'])->name('pengelola.keluar');
});

// Halaman sementara, diganti pada Epic 5 dan 6
Route::middleware('auth:admin')->group(function () {
    Route::view('admin', 'admin.beranda')->name('admin.beranda');
});

Route::middleware('auth:instansi')->group(function () {
    Route::view('penyetuju', 'penyetuju.beranda')->name('penyetuju.beranda');
});
