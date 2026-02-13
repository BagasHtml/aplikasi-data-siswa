<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilai = [
            [
                "id" => 1,
                "nama" => "Bagas Tresna",
                "mata_pelajaran" => "Matematika",
                "nilai" => "100",
                "rata_rata" => 80.5,
            ]
        ];
        DB::table('table_nilai')->insert($nilai);
    }
}
