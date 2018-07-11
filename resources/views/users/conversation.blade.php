@extends('layouts.app')

@section('content')
    <h1>Conversación con {{ $conversation->users->except($user->id)->implode('name',', ') }}</h1>
    @foreach ($conversation->privateMessages as $message)
        <div class="card">
            <div class="card-header">
                {{ $message->user->name }} dijo...
            </div>
            <div class="card-body">
                <p class="card-text">
                        {{ $message->message }}
                </p>
            </div>
            <div class="card-footer">
                <p>{{ $message->created_at }}</p>
            </div>            
        </div>
    @endforeach
@endsection