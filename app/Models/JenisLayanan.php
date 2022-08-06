<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_layanan';
    protected $guarded = ['id'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'id_jenis_layanan');
    }
}
