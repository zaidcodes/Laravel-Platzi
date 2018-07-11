@extends('layouts.app')

@section('content')
    @if($user)   
        <h1>{{ $user->name }}</h1>
        <a href="/{{ $user->username }}/follows" class="btn btn-info">
            Sigue a <span class="badge badge-dark">{{ $user->follows->count() }}</span>
        </a>
        <a href="/{{ $user->username }}/followers" class="btn btn-info">
            Seguidores <span class="badge badge-dark">{{ $user->followers->count() }}</span>
        </a>
        @if (Auth::check())
            <form class="row py-3" action="/{{ $user->username }}/dms" method="POST">
                @csrf
                <input type="text" name="message" class="form-control col-8 mx-auto">
                <button type="submit" class="btn btn-success col-3 mx-auto">
                    Enviar DM
                </button> 
            </form>
            @include('users.actionFollow')
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