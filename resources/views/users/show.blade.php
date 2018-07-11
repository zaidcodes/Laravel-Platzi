@extends('layouts.app')

@section('content')
    @if($user)   
        <h1>{{ $user->name }}</h1>
        <a href="/{{ $user->username }}/follows" class="btn btn-link">
            Sigue a <span class="badge badge-light">{{ $user->follows->count() }}</span>
        </a>
        <a href="/{{ $user->username }}/followed" class="btn btn-link">
            Seguidores <span class="badge badge-light">{{ $user->followers->count() }}</span>
        </a>

        @if (Auth::check())
            @if (Auth::user()->isFollowing($user))
                <form action="/{{ $user->username }}/unfollow" method="POST">
                    @csrf
                    @if (session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    <button class="btn btn-danger">Unfollow</button>
                </form>
            @else
                <form action="/{{ $user->username }}/follow" method="POST">
                    @csrf
                    @if (session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                    <button class="btn btn-primary">Follow</button>
                </form>
            @endif  
        @endif
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