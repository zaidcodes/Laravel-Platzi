@extends('layouts.app')

@section('content')
    @if($user)
        <h1>
            {{ $user->name }} 
            @if (Auth::check() && Auth::user()->isFollowing($user))
                @include('users.actionUnfollow')
            @else
                @include('users.actionfollow')
            @endif 
        </h1>
        <a href="/{{ $user->username }}/follows" class="btn btn-info">
            Sigue a <span class="badge badge-dark">{{ $user->follows->count() }}</span>
        </a>
        <a href="/{{ $user->username }}/followers" class="btn btn-info">
            Seguidores <span class="badge badge-dark">{{ $user->followers->count() }}</span>
        </a>
        @if (Auth::check())
            <form class="row py-3 mx-auto" action="/{{ $user->username }}/dms" method="POST">
                @csrf
                <input type="text" name="message" class="form-control col-9 d-inline" placeholder="Mensaje">
                <button type="submit" class="btn btn-success col-2 d-inline mx-auto">
                    Enviar DM
                </button> 
            </form>
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