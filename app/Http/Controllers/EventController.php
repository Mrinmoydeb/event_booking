<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Seat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('user.event', [
            'events' =>   $events
        ]);
    }

    public function seats($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $seats = Seat::where('event_id', $event->id)->get();

        return view('user.seats', compact('event', 'seats'));
    }


    // Admin
    public function eventList()
    {
        $events = Event::all();
        return view('admin.event.index', [
            'events' => $events
        ]);
    }
    public function eventShow(Request $request, $id)
    {
        $event = Event::with('seats')->findOrFail($id);

        $bookings = Booking::with('user', 'event')
            ->where('event_id', $id)
            ->get();

        $availableSeats = $event->seats->where('status', 'available');
        $bookedSeats = $event->seats->where('status', 'booked');

        return view('admin.event.show', [
            'event' => $event,
            'bookings' => $bookings,
            'availableSeats' => $availableSeats,
            'bookedSeats' => $bookedSeats,
        ]);
    }
    public function eventCreate()
    {
        return view('admin.event.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'venue' => 'required|string|max:255'
        ]);
        $event = Event::create([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'venue' => $validated['venue'],
            'slug' => Str::slug($validated['name'])
        ]);

        $rows = range('A', 'C');
        $columns = range(1, 10);

        foreach ($rows as $row) {
            foreach ($columns as $column) {
                Seat::create([
                    'event_id' => $event->id,
                    'seat_number' => $row . $column,
                    'status' => 'available'
                ]);
            }
        }

        return redirect()->route('event.adminlist')->with('success', 'Event created with seats!');
    }


    public function evnetEdit(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.event-update', [
            'event' => $event
        ]);
    }
    public function evnetUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
        ]);

        $event = Event::findOrFail($id);

        $event->update([
            'name' => $validated['name'],
            'date' => $validated['date'],
            'venue' => $validated['venue'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('event.adminlist')->with('success', 'Updated successfully.');
    }
}
