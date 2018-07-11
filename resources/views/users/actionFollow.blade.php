@if (Auth::user()->isFollowing($user))
<form action="/{{ $user->username }}/unfollow" method="POST">
    @csrf
    {{-- @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif --}}
    <button class="btn btn-danger">Unfollow</button>
</form>
@else
<form action="/{{ $user->username }}/follow" method="POST">
    @csrf
    {{-- @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif --}}
    <button class="btn btn-primary">Follow</button>
</form>
@endif 