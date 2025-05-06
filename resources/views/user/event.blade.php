@extends('user.templates.base')
@section('content')
@if($events->count())
<div class="container py-5">
    <h1>Events</h1>
    <div class="row g-4">

        @foreach ($events as $event)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 blog-card"> <img
                    src="https://placehold.co/600x400" class="card-img-top"
                    alt="Event image">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <div class="tags mb-1"> <span class="badge rounded-pill">Date:
                            {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}
                        </span> </div>
                    <div class="tags mb-3"> <span class="badge rounded-pill">Venue: {{ $event->venue }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center"> <a
                            href="{{ route('event.seats', $event->slug) }}" class="btn btn-primary read-more">Book
                            now</a> </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<h1>Events not available.</h1>
@endif
@endsection
