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
                <form action="{{ route('logout') }}" method="POST" class="inline-form">
                    @csrf
                    <button type="submit" class="logout-link"><i class="fas fa-power-off"></i> Logout</button>
                </form>
            </nav>
        </header>

        <main class="content-card">
            <div class="table-header">
                <div>
                    <h2>Nilai Siswa</h2>
                    <p>Total data: {{ count($nilai) }} siswa terdaftar</p>
                </div>
                <a href="{{ route('add') }}" class="btn-add">
                    <i class="fas fa-plus"></i> Tambah Siswa
                </a>
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
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Rata-Rata</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $n)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td class="font-bold">{{ $n->nama }}</td>
                            <td><span class="age-badge">{{ $n->mata_pelajaran }} </span></td>
                            <td class="text-truncate">{{ $n->nilai }}</td>
                            <td><span class="badge-kelas">{{ $n->rata_rata }}</span></td>
                            <td class="actions">
                                <a href="{{ route('edit', $n->id) }}" class="btn-action edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <form action="{{ route('delete', $n->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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