<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Siswa</h2>
    <p class="subtitle">Silakan isi data lengkap siswa di bawah ini.</p>

    <form action="{{ route('store') }}" method="POST" id="siswaForm">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Contoh: Budi Santoso" required>
        </div>

        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" placeholder="Masukkan umur" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" placeholder="Alamat rumah" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" placeholder="Contoh: 10 IPA 1" required>
        </div>

        <button type="submit" class="btn-submit" id="submitBtn">Simpan Data</button>
    </form>
</div>

<script src="../js/script.js"></script>
</body>
</html>