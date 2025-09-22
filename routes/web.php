<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'prosesData'])->name('prosesData');

Route::middleware(['AuthCheck'])->group(function () {
    Route::get('/admin', fn() => view('admin'))->name('admin')->middleware('UserAccess:admin');
    Route::get('/owner', fn() => view('owner'))->name('owner')->middleware('UserAccess:owner');
    Route::get('/kasir', fn() => view('kasir'))->name('kasir')->middleware('UserAccess:kasir');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [BukuController::class, 'index'])->name('admin.dashboard');

    // Form input buku
    Route::get('/input-data', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/input-buku', [BukuController::class, 'store'])->name('buku.store');
});

// Kategori Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori');
    Route::get('/admin', [KategoriController::class, 'postKategori'])->name('admin');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
});
