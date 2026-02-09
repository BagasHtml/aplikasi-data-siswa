<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login extends Authenticatable
{
    protected $table = 'table_login';
    protected $fillable = [
        'email',
        'username',
        'password'
    ];
}
