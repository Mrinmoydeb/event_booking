@extends('admin.templates.base')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Event</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('event.update', $event->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter event name" value="{{ old('name', $event->name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date"
                                       value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d')) }}">
                                </div>

                                <div class="form-group">
                                    <label for="venue">Venue</label>
                                    <input type="text" name="venue" class="form-control" id="venue"
                                        placeholder="Enter venue" value="{{ old('venue', $event->venue) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        @endsection
