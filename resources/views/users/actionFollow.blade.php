<form class="d-inline" action="/{{ $user->username }}/follow" method="POST">
    @csrf
    {{-- @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif --}}
    <button class="btn btn-primary">Follow</button>
</form>