@extends('layouts.app')

@section('content')
    @if($user)   
        <h1>{{ $user->name }}</h1>
        <form action="/{{ $user->username }}/follow" method="POST">
            @csrf
            @if (session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif
            <button class="btn btn-primary">Follow</button>
        </form>
        <div class="row">
            @forelse ($messages as $message)
                <div class="col-6">
                    @include('messages.message')
                </div>
            @empty
                <p>No hay mensajes para este usuario</p>
            @endforelse
        </div>
        @include('messages.pagination')
    @else
        <p class="text-danger">Usuario no existe</p>
    @endif
@endsection