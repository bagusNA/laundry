<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    const CREATED_AT = 'waktu_dibuat';
    const UPDATED_AT = 'waktu_diupdate';

    protected $table = 'tb_transaksi';

    protected $guarded = [
        'id'
    ];

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
