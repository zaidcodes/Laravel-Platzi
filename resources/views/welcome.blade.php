@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Laratter</h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <form action="messages/create" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" placeholder="Qué estás pensando?">
                @if ($errors->any())
                    @foreach ($errors->get('message') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
            <img class="img-thumbnail" src="{{$message->image}}">
                <p class="card-text">
                    {{ $message->content }}
                    <a href="/messages/{{ $message->id }}">More...</a>
                </p>
            </div>
        @empty
            <p>No hay mensajes destacados</p>
        @endforelse
    </div>
@endsection

@section('title')
    Home | Laratter
@endsection