@extends('layouts.app')

@section('content')
    @if ($user)
        <h1>{{ $user->name }}</h1>
        <ul class="row list-unstyled">
            @forelse ($follows as $follow)
                <li class="card text-center col col-11 col-sm-5 col-md-4 col-lg-3 my-2">
                    <a class="card-body" href="/{{ $follow->username }}">
                        <img class="img-thumbnail card-img-top img-fluid" src="{{$follow->avatar}}" alt="Card image cap">
                        <div class="card-body">
                            @if (Auth::check() && Auth::user()->isFollowing($follow))
                                @include('users.actionUnfollow',[
                                    'user'=> $follow,
                                ])
                            @else
                                @include('users.actionfollow',[
                                    'user'=> $follow,
                                ])
                            @endif 
                        </div>
                        <div class="card-body">
                            <p class="h2">{{ $follow->username }}</p>
                        </div>
                    </a>
                </li>
            @empty
                <p class="text-danger">Este usuario no sigue a otros</p>
            @endforelse
        </ul>
    @else
        <p class="text-danger">Usuario no existe</p>
    @endif
@endsection