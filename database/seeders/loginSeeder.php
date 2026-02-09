<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $login = [
            [
                "id" => 1,
                "email" => "bagashtml369@gmail.com",
                "username" => "bagas tresna",
                "password" => bcrypt("1234"),
            ],
        ];
        DB::table('table_login')->insert($login);
    }
}
