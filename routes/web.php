<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventBookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admins.login');
    Route::post('/login', [AdminController::class, 'checkLogin'])->name('admins.checkLogin');
});

Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('admins.logout');
    Route::get('/', [AdminController::class, 'home'])->name('admin.dashboard');
    // User
    Route::get('/users', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/{slug}', [UserController::class, 'show'])->name('users.show');
    Route::get('/user/create', [UserController::class, 'create'])->name('users.add');
    Route::get('user/update/{id}', [UserController::class, 'update'])->name('users.update');

    //bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.list');

    // Events
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/details/{id}', [EventController::class, 'eventShow'])->name('event.show');
    Route::get('/event/{id}/update', [EventController::class, 'evnetEdit'])->name('event.edit');
    Route::put('/event/{id}/update', [EventController::class, 'evnetUpdate'])->name('event.update');
    Route::get('/event-create', [EventController::class, 'eventCreate'])->name('event.create');
    Route::get('/eventlist', [EventController::class, 'eventList'])->name('event.adminlist');
    Route::delete('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');
});


Route::get('/', [EventController::class, 'index'])->name('event.list');
Route::middleware('userAuth')->group(function () {
    Route::get('/event/{slug}', [EventController::class, 'seats'])->name('event.seats');
    Route::post('/event/{id}/book', [EventBookingController::class, 'bookSeats'])->name('seat.book');
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])->name('booking.user');
});
// Registration
Route::get('/register', [RegistrationController::class, 'index'])->name('user.register');
Route::post('/user', [RegistrationController::class, 'store'])->name('user.store');
Route::get('/login', [RegistrationController::class, 'authlogin'])->name('user.login');
Route::post('/login', [RegistrationController::class, 'authenticate'])->name('user.authenticate');
Route::post('/logout', [RegistrationController::class, 'userlogout'])->name('user.logout')
?>
