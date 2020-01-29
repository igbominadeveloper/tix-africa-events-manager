@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10">
        <h2>Events</h2>
        <a class="btn btn-primary" href="/events/create">Create New Event</a>
        <br>
        <div class="row">
            @foreach($events as $event)
                @include('events.event')
            @endforeach
        </div>
    </div>
</div>
@endsection
