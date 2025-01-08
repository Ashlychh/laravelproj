<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <form action="{{ route('signup.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
