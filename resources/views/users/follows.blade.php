@extends('layouts.app')

@section('content')
    @if ($user)
        @forelse ($user->follows as $follow)
            <li>{{ $follow->username }}</li>
        @empty
            <p class="text-danger">Este usuario no sigue a otros</p>
        @endforelse
    @else
        <p class="text-danger">Usuario no existe</p>
    @endif
@endsection