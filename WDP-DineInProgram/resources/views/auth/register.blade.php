<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
    body::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: url("{{ asset('assets/img/bgregis.avif') }}"), #000;
        background-position: center;
        background-size: cover;
    }
</style>
</head>
<body>
    <div class="wrapper signup">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Sign Up</h2>
            <div class="input-field">
                <input type="nama" name="nama" required>
                <label>Enter your nama</label>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="no_hp" name="no_hp" required>
                <label>Enter your no. handphone</label>
                @error('no_hp')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="email" name="email" required>
                <label>Enter your email</label>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="alamat" name="alamat" required>
                <label>Enter your alamat</label>
                @error('alamat')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                <label for="password_confirmation">Confirm Password</label>
                @error('password_confirmation')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">Sign Up</button>
            
            <div class="register">
                <p>Already have account?<a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>


