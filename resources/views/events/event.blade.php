<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->title }}</h5>
            <p class="card-text">{{ $event->description }}</p>
            @if($event->createdBy == \Auth::id())
                <a href="/events/{{$event->id}}/edit" class="btn btn-primary">Edit Event</a>
                <form method="POST" action="/events/{{$event->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Event</a>
                </form>
            @endif
        </div>
    </div>
</div>
