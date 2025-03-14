<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\VehicleController;

// Route untuk menampilkan daftar kendaraan
Route::get('/vehicles', [VehicleController::class, 'index']);

// Route untuk menampilkan detail kendaraan
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/about', function () {
    return view('about');
});
Route::get('/booking', function () {
    return view('booking');
});
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
require __DIR__.'/auth.php';
