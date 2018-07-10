@extends('layouts.app')

@section('content')
    <h1 class="h3">Mensaje id: {{ $message->id }}</h1>
    <img class="img-thumbnail" src="{{ $message->image }}">
    <p class="card-text">
        {{ $message->content }}
    </p>
<small class="text-muted">Created at: {{ $message->created_at }}</small>
@endsection