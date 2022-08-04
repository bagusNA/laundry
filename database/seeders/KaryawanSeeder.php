<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karyawan::create([
            'username' => 'bagus',
            'password' => '$2a$12$S8VY0q5FHo9.qOiZAvS4U.T1IoHitALU6NhDseyNQTKs/GgbJS6.q',
            'nama' => 'Bagus',
            'posisi_kerja' => 'Kasir',
            'isKasir' => true
        ]);
    }
}
