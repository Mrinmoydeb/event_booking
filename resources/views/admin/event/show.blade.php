@extends('admin.templates.base')
@section('content')
<div class="p-4">
<h3>Event: {{ $event->name }}</h3>
<p>Date: {{ $event->date }}</p>
<p>Venue: {{ $event->venue }}</p>

<h4>Booked Users:</h4>
<ul>
    @foreach($bookings as $booking)
        <li>Booked By: {{ $booking->user->name }}</li>
    @endforeach
</ul>
<h4>Available Seats ({{ $availableSeats->count() }}):</h4>
<ul>
    {{-- @foreach($availableSeats as $seat)
        <li>{{ $seat->seat_number }}</li>
    @endforeach --}}
</ul>
<h4>Booked Seats ({{ $bookedSeats->count() }}):</h4>
{{-- <ul>
    @foreach($bookedSeats as $seat)
        <li>{{ $seat->seat_number }}</li>
    @endforeach
</ul> --}}
</div>
@endsection
