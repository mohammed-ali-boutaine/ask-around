<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
        @error('username') <p style="color: red;">{{ $message }}</p> @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <input type="password" name="password" placeholder="Password" required>
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('login.form') }}">Login here</a></p>
</body>
</html>
