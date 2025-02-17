<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <input type="password" name="password" placeholder="Password" required>
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="{{ route('register.form') }}">Register here</a></p>
</body>
</html>
