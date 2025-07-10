<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf
    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>

    <button type="submit">Register</button>
</form>
</body>
</html>
