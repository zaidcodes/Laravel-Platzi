<form class="d-inline" action="/{{ $user->username }}/unfollow" method="POST">
    @csrf
    {{-- @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif --}}
    <button class="btn btn-danger">Unfollow</button>
</form>