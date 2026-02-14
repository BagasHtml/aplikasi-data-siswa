<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
</head>
<body>
    <div class="bg-decoration">
        <div class="blur-circle"></div>
        <div class="blur-circle bottom-right"></div>
    </div>

    <div class="container">
        <header class="main-header">
            <div class="user-info">
                <div class="mini-avatar">{{ substr(auth()->user()->username, 0, 1) }}</div>
                <span>Halo, <strong>{{ auth()->user()->username }}</strong></span>
            </div>
            <nav class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-btn"><i class="fas fa-home"></i> Dashboard</a>
            </nav>
        </header>

        <main class="content-card">
            <div class="table-header">
                <div>
                    <h2>Absensi Siswa</h2>
                    <p>Total Siswa: {{ count($absensi) }} yang Hadir</p>
                </div>
                <button class="btn-add" style="background: green;">
                   <i class="fas fa-plus"></i> Simpan
                </button>
            </div>

            @if (session('success'))
                <div class="alert animate-pop">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>kelas</th>
                            <th>Waktu Kehadiran</th>
                            <th>Tanggal Kehadiran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $a)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td class="font-bold">{{ $a->nama }}</td>
                            <td><span class="age-badge">{{ $a->kelas }} Thn</span></td>
                            <td class="text-truncate">{{ $a->waktu_kehadiran }}</td>
                            <td><span class="badge-kelas">{{ $a->tanggal_kehadiran }}</span></td>
                            <td class="actions">
                                <form action="" method="POST">
                                    <input type="time" name="waktu_kehadiran" required />
                                    
                                    <br />

                                    <input type="date" name="tanggal_kehadiran" required />         
                                </form>                       
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>