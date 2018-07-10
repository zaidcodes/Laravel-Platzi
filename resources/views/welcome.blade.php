@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Julio Diaz - <a href="about" target="_blank">Zaidcodes</a>
    </div>
    @if (isset($teacher))
        <p>Profesor: {{ $teacher }}</p>
    @else
        <p>Profesor: Por definir</p>
    @endif
    <div class="links">
        @foreach ($links as $link => $text)
            <a href="{{ $link }}"> {{$text}} </a>
        @endforeach
    </div>    
@endsection

@section('title')
    Welcome | Zaidcodes
@endsection