<!DOCTYPE html>
<html>
<head><title>Link Page</title></head>
<body>
<h1>Welcome, {{ $userLink->username }}</h1>
@if (session('status'))
    <p style="color: green;">{{ session('status') }}</p>
@endif

<form method="POST" action="/link/{{ $userLink->uuid }}/lucky">
    @csrf
    <button type="submit">I'm Feeling Lucky</button>
</form>

<form method="GET" action="/link/{{ $userLink->uuid }}/history">
    <button type="submit">History</button>
</form>

<form method="POST" action="/link/{{ $userLink->uuid }}/deactivate">
    @csrf
    <button type="submit">Deactivate Link</button>
</form>

<form method="POST" action="/link/{{ $userLink->uuid }}/regenerate">
    @csrf
    <button type="submit">Regenerate Link</button>
</form>


</body>
</html>
