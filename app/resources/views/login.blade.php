<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login | Portal Akademik</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST" class="login-email">
            @csrf
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign In</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="user_number" value="{{ old('user_number') }}" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Sign In</button>
            </div>
        </form>
    </div>
</body>
</html>