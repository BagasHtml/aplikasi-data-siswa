<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/crud.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2 style="font-size: 25px;">Halo! {{ auth()->user()->username }}</h2>
        <h2>Daftar Siswa</h2>
        <a href="{{ route('add') }}" class="btn-add">+ Tambah Siswa</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                Logout
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert" id="successAlert">
            🎉 {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-weight: 600;">{{ $s->nama }}</td>
                    <td>{{ $s->umur }} Thn</td>
                    <td>{{ $s->alamat }}</td>
                    <td><span class="badge-kelas">{{ $s->kelas }}</span></td>
                    <td class="actions">
                        <a href="{{ route('edit', $s->id) }}" class="btn-edit">Edit</a>
                        
                        <form action="{{ route('delete', $s->id) }}" method="post" onsubmit="return confirmDelete()">
                            @csrf
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="../js/script.js"></script>
</body>
</html>