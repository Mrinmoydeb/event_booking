@extends('user.templates.base')
@section('content')
@if($userBookings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Date</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userBookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->event->name ?? 'N/A' }}</td>
                    <td>{{ $booking->event->date ?? 'N/A' }}</td>
                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{ $userBookings->links() }}

@else
    <p>You have no bookings yet.</p>
@endif

@endsection
