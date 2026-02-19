<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class absensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $absensi = [
            [
                "id" => 1,
                "nama" => "Adzka Hibrizi",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
            [
                "id" => 2,
                "nama" => "Alan Benuari",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
            [
                "id" => 3,
                "nama" => "Andi Attar",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
            [
                "id" => 4,
                "nama" => "Ardan Maulid",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
            [
                "id" => 5,
                "nama" => "Bagas Tresna",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
            [
                "id" => 6,
                "nama" => "Banu Mibras",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => now(),
                "tanggal_kehadiran" => now(),
            ],
        ];
        DB::table('table_absensi')->insert($absensi);
    }
}
