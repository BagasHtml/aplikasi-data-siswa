<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/crud.css') }}">
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

            <form action="{{ route('proses.absensi') }}" method="POST" id="absensi-form">
                @csrf
                @method('PUT')

                <div class="table-header">
                    <div>
                        <h2>Absensi Siswa</h2>
                        <p>
                            @if (request('kelas'))
                                Kelas <strong>{{ request('kelas') }}</strong> &mdash;
                            @endif
                            Total Siswa: {{ count($absensi) }} yang Hadir
                        </p>
                    </div>

                    <div class="table-header-actions">

                        <form method="GET" action="{{ route('absensi') }}" id="filter-form">
                            <select
                                name="kelas"
                                class="filter-select"
                                onchange="document.getElementById('filter-form').submit()"
                                title="Filter berdasarkan kelas"
                            >
                                <option value="">-- Semua Kelas --</option>
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <button
                            type="submit"
                            form="absensi-form"
                            class="btn-add"
                            style="background: green; border: none; cursor: pointer;"
                            name="simpan"
                        >
                            <i class="fas fa-save"></i> Simpan Semua Perubahan
                        </button>
                    </div>
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
                                <th>Kelas</th>
                                <th style="position: relative; right: -30px;">Waktu & Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($absensi as $a)
                                <tr>
                                    <td class="text-muted">{{ $loop->iteration }}</td>
                                    <td class="font-bold">{{ $a->nama }}</td>
                                    <td><span class="age-badge">{{ $a->kelas }}</span></td>
                                    <td class="actions">
                                        <div style="display: flex; gap: 5px;">
                                            <input
                                                type="time"
                                                name="absensi[{{ $a->id }}][waktu]"
                                                value="{{ $a->waktu_kehadiran }}"
                                                class="absen"
                                                required
                                            />
                                            <input
                                                type="date"
                                                name="absensi[{{ $a->id }}][tanggal]"
                                                value="{{ $a->tanggal_kehadiran }}"
                                                class="absen"
                                                required
                                            />
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 24px; color: #9ca3af;">
                                        <i class="fas fa-inbox" style="font-size: 24px; display: block; margin-bottom: 8px;"></i>
                                        Tidak ada data absensi
                                        @if (request('kelas'))
                                            untuk kelas <strong>{{ request('kelas') }}</strong>
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

        </main>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>