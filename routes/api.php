<?php

use App\Http\Controllers\Api\EventBookingController;
use App\Http\Controllers\TwilioMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/event/{id}/book', [EventBookingController::class, 'bookSeats'])->name('event.book');


