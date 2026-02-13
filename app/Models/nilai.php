<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    public $timestamps = false;
    protected $table = 'table_nilai';
    protected $fillable = [
        'nama',
        'mata_pelajaran',
        'nilai',
        'rata_rata',
    ];
}
