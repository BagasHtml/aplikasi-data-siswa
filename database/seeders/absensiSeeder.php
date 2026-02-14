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
                "nama" => "Bagas Tresna Nanda MS",
                "kelas" => "XI RPL 5",
                "waktu_kehadiran" => 9.00,
                "tanggal_kehadiran" => now(),
            ]
        ];
        DB::table('table_absensi')->insert($absensi);
    }
}
