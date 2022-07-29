<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_karyawan';

    protected $fillable = [
        'username',
        'password',
        'posisi_kerja',
        'isKasir'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
