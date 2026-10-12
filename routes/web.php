<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/buku');

Route::get('/dashboard', fn () => redirect()->route('buku.index'))
    ->middleware('auth')
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('buku', BukuController::class)->except(['show']);

    Route::resource('anggota', AnggotaController::class)
         ->only(['index', 'create', 'store', 'destroy']);

    Route::resource('peminjaman', PeminjamanController::class)
         ->only(['index', 'create', 'store']);

    Route::resource('anggota', AnggotaController::class)
     ->only(['index', 'create', 'store', 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
