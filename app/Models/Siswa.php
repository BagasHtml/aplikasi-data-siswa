<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;
    protected $table = "table_data";
    protected $fillable = [
        'id',
        "nama",
        'id_absensi',
        "umur",
        "alamat",
        "kelas",
    ];
}
