<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ auth()->user()->username }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="bg-decoration">
        <div class="blur-circle"></div>
        <div class="blur-circle bottom-right"></div>
    </div>

    <section class="wrapper">
        <div class="dashboard-card">
            <div class="profile-header">
                <div class="avatar">
                    {{ substr(auth()->user()->username, 0, 1) }}
                </div>
                <div class="welcome-text">
                    <h1>Selamat Datang, <span>{{ auth()->user()->username }}</span>!</h1>
                    <p>Senang melihat Anda kembali di sistem manajemen.</p>
                </div>
            </div>

            <hr class="divider">

            <div class="menu-section">
                <p class="section-title">Akses Cepat</p>
                <div class="menu-grid">
                    <a href="{{ route('siswa') }}" class="menu-item primary">
                        <div class="icon"><i class="fas fa-users-viewfinder"></i></div>
                        <div class="info">
                            <h3>Kelola Siswa</h3>
                            <p>Lihat, tambah, dan edit data</p>
                        </div>
                        <i class="fas fa-chevron-right arrow"></i>
                    </a>

                    <a href="{{ route('nilai') }}">
                        <div class="icon"><i class="fas fa-users-viewfinder"></i></div>
                        <div class="info">
                            <h3>Kelola Nilai Siswa</h3>
                            <p>Kelola Nilai Siswa</p>
                        </div>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="menu-item danger">
                            <div class="icon"><i class="fas fa-right-from-bracket"></i></div>
                            <div class="info">
                                <h3>Keluar Sistem</h3>
                                <p>Selesaikan sesi Anda sekarang</p>
                            </div>
                            <i class="fas fa-chevron-right arrow"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="dashboard-footer">
                <p>&copy; 2026 Admin System • Versi 1.0</p>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>