<img class="img-thumbnail" src="{{$message->image}}">
<p class="card-text">
    <div class="text-muted">Escrito por 
        <a href="/{{ $message->user->username }}">
            {{$message->user->name}}
        </a>
        <span class="card-text text-muted">en {{ $message->created_at }}</span>
    </div>
    {{ $message->content }}
    <a href="/messages/{{ $message->id }}">More...</a>
</p>