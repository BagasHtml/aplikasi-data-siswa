<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Silakan login untuk mengelola data siswa</p>
            @if(session()->has('loginError'))
            <div style="color: #991b1b; background-color: #fee2e2; padding: 10px; border-radius: 10px; margin-bottom: 15px; font-size: 0.85rem;">
                {{ session('loginError') }}
            </div>
            @endif

            @if($errors->any())
            <div style="color: #991b1b; font-size: 0.8rem; margin-bottom: 10px;">
                Pastikan semua kolom terisi dengan benar!
            </div>
            @endif
        </div>

        <form id="loginForm" action="{{ route('proses') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="nama@sekolah.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="options">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login" id="btnLogin">Login Sekarang</button>
        </form>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>