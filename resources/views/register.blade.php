<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register</h1>

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
