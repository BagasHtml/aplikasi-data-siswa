<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;

class KelasSeeder extends Seeder
{
    private const KELAS_LIST = [
        'RPL 1', 'RPL 2', 'RPL 3', 'RPL 4', 'RPL 5',
    ];

    private const NAMA_SISWA = [
        'Andi Prasetyo', 'Budi Santoso', 'Citra Dewi',
        'Dian Rahayu', 'Eko Wahyudi', 'Fajar Nugroho',
        'Gita Permata', 'Hendra Kusuma', 'Indah Lestari', 'Joko Purnomo',
        'Kevin Alfarizi', 'Lina Marlina', 'Muhammad Rizky', 'Nadia Putri', 'Omar Hakim',
        'Putri Aulia', 'Qori Ramdhan', 'Raka Pratama', 'Sari Dewanti', 'Teguh Wibowo',
        'Umar Faruq', 'Vina Oktavia', 'Wahyu Setiawan', 'Xena Pitaloka', 'Yoga Aditya',
        'Zahra Nabila', 'Arif Hidayat', 'Bella Safitri', 'Chandra Wijaya', 'Dinda Amelia',
    ];

    private const WAKTU_KEHADIRAN = [
        '07:00:00', '07:05:00', '07:10:00', '07:15:00', '07:20:00',
        '07:25:00', '07:30:00', '07:35:00', '07:40:00', '07:45:00',
    ];

    private const TANGGAL_KEHADIRAN = [
        '2025-01-06', '2025-01-07', '2025-01-08', '2025-01-09', '2025-01-10',
        '2025-01-13', '2025-01-14', '2025-01-15', '2025-01-16', '2025-01-17',
    ];

    public function run(): void
    {
        foreach (self::KELAS_LIST as $kelas) {
            foreach (self::NAMA_SISWA as $nama) {
                Absensi::create([
                    'nama'              => $nama,
                    'kelas'             => $kelas,
                    'waktu_kehadiran'   => self::WAKTU_KEHADIRAN[array_rand(self::WAKTU_KEHADIRAN)],
                    'tanggal_kehadiran' => self::TANGGAL_KEHADIRAN[array_rand(self::TANGGAL_KEHADIRAN)],
                ]);
            }
        }
    }
}
