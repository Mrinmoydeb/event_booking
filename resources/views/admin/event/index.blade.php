@extends('admin.templates.base')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Events</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Events</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->venue }}</td>
                                        <td style="display: flex">
                                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-md  p-1"><i
                                                    class="fas fa-pen fa-1x text-primary"></i></a>
                                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-md  p-1"><i
                                                    class="fas fa-eye fa-1x text-info"></i></a>
                                            <form action="{{ route('event.delete', $event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-md p-1">
                                                    <i class="fas fa-trash fa-1x text-danger"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
