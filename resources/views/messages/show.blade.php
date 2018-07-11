@extends('layouts.app')

@section('content')
    <h1 class="h3">Mensaje id: {{ $message->id }}</h1>
    @include('messages.message')
<small class="text-muted">Created at: {{ $message->created_at }}</small>
@endsection