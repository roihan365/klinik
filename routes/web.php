<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AdminDokterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute umum
Route::get('/', function () {
    return view('welcome');
});

// Titik masuk utama dashboard (Mengarah ke dashboard.blade.php yang berisi @role)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute khusus untuk role Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // 1. Dashboard utama admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // 2. Rute Resource untuk CRUD Dokter (Menghasilkan admin.dokter.index, admin.dokter.create, dll.)
    Route::resource('admin/dokter', AdminDokterController::class)
          ->names('admin.dokter')
          ->except(['show']); // Tidak menggunakan admin.dokter (tunggal)
});

// Rute khusus untuk role Pasien
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/dashboard/pasien', [PasienController::class, 'index'])->name('pasien.dashboard');
});

// Rute khusus untuk role Dokter
Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', [DokterController::class, 'index'])->name('dokter.dashboard');
});

// Rute default dari Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';