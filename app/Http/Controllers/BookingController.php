<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->paginate(10);
        return view('admin.booking.index', [
            'bookings' => $bookings,
        ]);
    }



    // Show user bookings
    public function userBookings()
    {
        $userBookings = Auth::user()->bookings()->with('event')->latest()->paginate(10);
        return view('user.history', [
            'userBookings' => $userBookings,
        ]);
    }
}
