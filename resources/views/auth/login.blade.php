<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/login.js') }}"></script>
    <style>
    body::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url("{{ asset('assets/img/hero-bg.jpg') }}"), #000;
        background-position: center;
        background-size: cover;
    }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>
            
            @if ($errors->any())
                <div class="error show">
                    <ul>
                        @foreach ($errors->all() as $error)
                        @endforeach
                    </ul>
                </div>
            @endif


            @error('email')
                <div class="error show">{{ $message }}</div>
            @enderror
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Enter your email</label>
            </div>

            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
            </div>

            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Remember me</p>
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
