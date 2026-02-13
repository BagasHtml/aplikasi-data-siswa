<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ auth()->user()->username }}</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <!-- Background Elements -->
    <div class="bg-decoration">
        <div class="blur-circle top-left"></div>
        <div class="blur-circle bottom-right"></div>
    </div>

    <section class="wrapper">
        <div class="dashboard-card">
            
            <!-- Header Profile -->
            <div class="profile-header">
                <div class="avatar">
                    {{ substr(auth()->user()->username, 0, 1) }}
                </div>
                <div class="welcome-text">
                    <h1>Halo, <span>{{ auth()->user()->username }}</span></h1>
                    <p>Dashboard Manajemen Sekolah</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Menu Section -->
            <div class="menu-section">
                <p class="section-title">Menu Utama</p>
                
                <div class="menu-grid">
                    <!-- Menu 1: Siswa -->
                    <a href="{{ route('siswa') }}" class="menu-item primary">
                        <div class="icon-box">
                            <i class="fas fa-users-viewfinder"></i>
                        </div>
                        <div class="text-content">
                            <h3>Data Siswa</h3>
                            <p>Kelola data siswa secara lengkap</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <!-- Menu 2: Nilai (Perbaikan Struktur di sini) -->
                    <a href="{{ route('nilai') }}" class="menu-item secondary">
                        <div class="icon-box">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="text-content">
                            <h3>Input Nilai</h3>
                            <p>Rekap nilai akademik siswa</p>
                        </div>
                        <div class="action-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>

                    <!-- Menu 3: Logout -->
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="menu-item danger">
                            <div class="icon-box">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="text-content">
                                <h3>Keluar</h3>
                                <p>Menutup sesi admin</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="dashboard-footer">
                <p>&copy; 2026 Admin System • v1.0.2</p>
            </div>
        </div>
    </section>

    <!-- Custom JS -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>