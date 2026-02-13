<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #10b981;
            --bg-color: #f0fdf4;
            --text-main: #064e3b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            background-image: 
                radial-gradient(at 0% 0%, rgba(16, 185, 129, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(5, 150, 105, 0.15) 0px, transparent 50%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            padding: 2.5rem;
            border-radius: 25px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .header-form {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            margin: -2.5rem -2.5rem 2rem -2.5rem;
            padding: 1.5rem;
            border-radius: 25px 25px 0 0;
            text-align: center;
        }

        .header-form h2 {
            color: white;
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            font-family: inherit;
            background: rgba(255, 255, 255, 0.9);
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-update {
            width: 100%;
            padding: 1rem;
            background: var(--primary-green);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-update:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #6b7280;
            text-decoration: none;
        }

        .btn-back:hover { color: var(--primary-green); }
    </style>
</head>
<body>

<div class="card">
    <div class="header-form">
        <h2>Edit Data Siswa</h2>
    </div>

    <form action="{{ route('update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $siswa->nama }}" required>
        </div>

        <div class="form-group">
            <label>Umur</label>
            <input type="number" name="umur" value="{{ $siswa->umur }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $siswa->alamat }}" required>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>

        <button type="submit" class="btn-update">Simpan Perubahan</button>
        <a href="{{ route('siswa') }}" class="btn-back">← Kembali ke Daftar</a>
    </form>
</div>

</body>
</html>