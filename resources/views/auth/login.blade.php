<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
</head>
<body>
    <div class="bg-decoration">
        <div class="blur-circle"></div>
        <div class="blur-circle bottom-right"></div>
    </div>

    <div class="auth-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Welcome Back</h2>
                <p>Silakan login untuk mengelola data siswa</p>
            </div>

            @if(session('error'))
                <div class="alert-danger animate-shake">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('proses') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="nama@sekolah.com" required value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="options">
                    <label class="checkbox-container">
                        <input type="checkbox"> 
                        <span class="checkmark"></span> Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <span>Login Sekarang</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="auth-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
        </div>
    </div>

</body>
</html>