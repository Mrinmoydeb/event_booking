<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventBookingController extends Controller
{
    public function bookSeats(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $selectedSeatIds = $request->input('seats', []);

        if (empty($selectedSeatIds)) {
            return response()->json([
                'success' => false,
                'message' => 'Please select at least one seat.'
            ], 422);
        }

        $seats = Seat::whereIn('id', $selectedSeatIds)
            ->where('event_id', $event->id)
            ->where('status', 'available')
            ->get();

        if ($seats->count() !== count($selectedSeatIds)) {
            return response()->json([
                'success' => false,
                'message' => 'One or more selected seats are no longer available.'
            ], 409);
        }

        foreach ($seats as $seat) {
            $seat->update(['status' => 'booked']);

            Booking::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id,
                'seat_id' => $seat->id,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Seats booked successfully!'
        ]);
    }
}
