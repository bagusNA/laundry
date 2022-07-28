<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan');
            $table->foreignId('id_karyawan');
            $table->smallInteger('total_berat');
            $table->integer('total_harga');
            $table->timestamp('waktu_diambil');
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('tb_pelanggan');
            $table->foreign('id_karyawan')->references('id')->on('tb_karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
