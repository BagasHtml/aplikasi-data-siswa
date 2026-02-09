<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataSiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            [
                "id" => 1,
                "nama" => "Bagas Tresna Nanda MS",
                "umur" => 15,
                "alamat" => "Griya Kota Bekasi 1",
                "kelas" => "XI RPL 5",
            ],
            [
                "id" => 2,
                "nama" => "Habibah Khairu Nisa",
                "umur" => 17,
                "alamat" => "Jakarta Pusat",
                "kelas" => "XI DKV 2",
            ],
            [
                "id" => 3,
                "nama" => "Gibran",
                "umur" => 19,
                "alamat" => "Gang Mercy Babelan",
                "kelas" => "XI RPL 5",
            ],
            [
                "id" => 4,
                "nama" => "Putri Ayu Sandewa",
                "umur" => 17,
                "alamat" => "Perumahan Primaya Indah 1",
                "kelas" => "XI DKV 2",
            ]
        ];
        DB::table('table_data')->insert($siswa);
    }
}
