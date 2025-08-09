<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'prosesData'])->name('prosesData');

Route::middleware(['AuthCheck'])->group(function () {

Route::get('/admin', fn() => view('admin'))->name('admin')->middleware('UserAccess:admin');
Route::get('/owner', fn() => view('owner'))->name('owner')->middleware('UserAccess:owner');
Route::get('/kasir', fn() => view('kasir'))->name('kasir')->middleware('UserAccess:kasir');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');