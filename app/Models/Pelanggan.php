<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'tb_pelanggan';

    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}
