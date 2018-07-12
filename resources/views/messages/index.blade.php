@extends('layouts.app')

@section('content')
    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @empty
            <p>No se encontraron resultados</p>
        @endforelse
    </div>
    @include('messages.pagination')
@endsection