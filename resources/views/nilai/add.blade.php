<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Nilai Siswa</h2>
    <p class="subtitle">Silakan isi Nilai lengkap siswa di bawah ini.</p>

    <form action="{{ route('tambah') }}" method="POST" id="siswaForm">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Contoh: Budi Santoso" required>
        </div>

        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="umur" placeholder="Masukkan Mata Pelajaran" required>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" id="alamat" placeholder="Nilai" required>
        </dibav>

        <div class="form-group">
            <label for="rata_rata">Rata-Rata</label>
            <input type="float" name="rata_rata" id="kelas" placeholder="Contoh: 80.5" required>
        </div>

        <button type="submit" class="btn-submit" id="submitBtn">Simpan Data</button>
    </form>
</div>

<script src="../js/script.js"></script>
</body>
</html>