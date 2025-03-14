<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('home');

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
Route::get('/vehicles', function () {
    return view('vehicles.index');
})->name('vehicles');

Route::get('/vehicles/{id}', function ($id) {
    return view('vehicle.details', ['id' => $id]); // Menampilkan detail kendaraan
})->name('vehicle.details');

Route::get('/booking', function () {
    return view('booking.availablecar');
})->name('booking');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');;

require __DIR__.'/auth.php';
