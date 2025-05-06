@extends('user.templates.base')
@section('content')
<div class="container">
    <div class="form-group">
        <h3>Select Seats for Event: {{ $event->name }}</h3>

        <form id="booking-form">
            @csrf
            <div class="seats-container">
                @foreach($seats as $seat)
                    <div class="seat-wrapper d-inline-block m-1">
                        <input
                            type="checkbox"
                            name="seats[]"
                            value="{{ $seat->id }}"
                            id="seat-{{ $seat->id }}"
                            class="seat-checkbox d-none"
                            {{ $seat->status === 'booked' ? 'disabled' : '' }}
                        >
                        <label
                            for="seat-{{ $seat->id }}"
                            class="seat-label btn btn-sm
                                {{ $seat->status === 'booked' ? 'btn-secondary disabled' : 'btn-outline-primary' }}"
                        >
                            {{ $seat->seat_number }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary mt-3">Book</button>
        </form>

        <div id="response-message" class="mt-3"></div>
    </div>
</div>

<script>
    document.getElementById('booking-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const selectedSeats = Array.from(document.querySelectorAll('input[name="seats[]"]:checked'))
            .map(cb => cb.value);

        if (selectedSeats.length === 0) {
            alert('Select at least one seat to proceed.');
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('seat.book', $event->id) }}", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                const response = JSON.parse(xhr.responseText);
                const msgBox = document.getElementById('response-message');
                if (xhr.status === 200 && response.success) {
                    msgBox.innerHTML = `<div class="alert alert-success">${response.message}</div>`;
                    setTimeout(() => location.reload(), 2000);
                } else {
                    msgBox.innerHTML = `<div class="alert alert-danger">${response.message || 'Something went wrong.'}</div>`;
                }
            }
        };

        xhr.send(JSON.stringify({ seats: selectedSeats }));
    });
</script>
@endsection
