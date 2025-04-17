<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShowdetailsController;
use App\Http\Controllers\VehicleController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehicleController::class, 'homepagecar'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk menampilkan daftar kendaraan
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles');

Route::get('/vehicles/{vehicle}', [VehicleController::class, 'detail'])->name('vehicles.details');

Route::get('/booking', function () {
    return view('booking.availablecar');
})->name('booking');

Route::get('/car', [ShowController::class, 'index'])->name('show');
Route::get('/car/show/{id}', [ShowdetailsController::class, 'index'])->name('showcar');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('store');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('edit');
Route::put('/admin/{vehicle}/update', [AdminController::class, 'update'])->name('update');
Route::delete('/admin/destroy/{vehicle}', [AdminController::class, 'destroy'])->name('destroy');

// Route::get('/car', function () {
//     return view('booking.show');
// })->name('show');
// Booking routes
Route::middleware(['auth', 'verified'])->prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [RentalController::class, 'index'])->name('index'); // /booking
    Route::get('/check-availability', [RentalController::class, 'checkAvailability'])->name('check-availability');
    Route::get('/vehicle/{vehicle}', [RentalController::class, 'rentVehicle'])->name('book-vehicle');
    Route::post('/store', [RentalController::class, 'store'])->name('store');
    Route::get('/confirmation/{rental}', [RentalController::class, 'confirmation'])->name('confirmation');
    Route::patch('/{rental}/cancel', [RentalController::class, 'cancel'])->name('cancel');

    // Payment routes
    Route::get('/payment/{rental}', [RentalController::class, 'showPayment'])->name('payment');
    Route::post('/payment/{rental}/process', [RentalController::class, 'processPayment'])->name('process-payment');

    // Receipt
    Route::get('/{rental}/receipt', [CustomerController::class, 'downloadReceipt'])->name('receipt');
});
// Customer routes
Route::middleware(['auth', 'verified'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/history', [CustomerController::class, 'history'])->name('history');
    Route::get('/history/{rental}', [CustomerController::class, 'historyDetail'])->name('history-detail');
    Route::patch('/booking/{rental}/cancel', [CustomerController::class, 'cancelBooking'])->name('cancel-booking');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

require __DIR__.'/auth.php';
