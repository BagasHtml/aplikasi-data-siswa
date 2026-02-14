<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <h2>Edit Nilai</h2>
    <p class="subtitle">Silahkan Edit Nilai siswa yang anda input</p>

    <form action="{{ route('update.nilai', $nilai->id) }}" method="POST" id="siswaForm">
        @csrf
        @method('PUT')
        <div class="form_group">
            <label for="id">ID</label>
            <input type="number" readonly name="id" value="{{ $nilai->id }}" id="">
        </div>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="{{ $nilai->nama }}" required>
        </div>

        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="umur" value="{{ $nilai->mata_pelajaran }}" required>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" id="alamat" value="{{ $nilai->nilai }}" required>
        </dibav>

        <div class="form-group">
            <label for="rata_rata">Rata-Rata</label>
            <input type="float" name="rata_rata" id="kelas" value="{{ $nilai->rata_rata }}" required>
        </div>

        <button type="submit" class="btn-submit" id="submitBtn">Simpan Data</button>
    </form>
</div>

<script src="../js/script.js"></script>
</body>
</html>