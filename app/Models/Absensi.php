<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public $timestamps = false;
    protected $table = 'table_absensi';
    protected $fillable = [
        'id',
        'id_siswa',
        'nama',
        'kelas',
        'waktu_kehadiran',
        'tanggal_kehadiran',
    ];
}
