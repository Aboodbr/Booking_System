<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about', [HomeController::class, 'about'])->name('home.about');


// User profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/my_booking', [ProfileController::class, 'show_booking'])->name('profile.my_booking');

});

// Room routes
Route::get('/Apartment', [RoomController::class, 'getall'])->name('home.rooms');
Route::get('/Apartment/{id}', [RoomController::class, 'getone'])->name('home.one_room');
Route::get('/hotel/{id}/rooms', [HotelController::class, 'showRooms'])->name('hotel.rooms');
Route::post('/book-room', [RoomController::class, 'booking'])->name('book_room');

//Paypal routes
Route::post('/paypal/create', [PaypalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/success', [PaypalController::class, 'paymentSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'paymentCancel'])->name('paypal.cancel');
Route::view('/payment-success', 'payment-success')->name('payment.success');
Route::view('/payment-cancelled', 'payment-cancelled')->name('payment.cancelled');
Route::view('/payment-failed', 'payment-failed')->name('payment.failed');
Route::get('/payment/success/{id}', function ($id) {
    $booking = \App\Models\Booking::findOrFail($id);
    return view('payment-success', compact('booking'));
})->name('payment.success');


// Include auth routes
require __DIR__ . '/auth.php';