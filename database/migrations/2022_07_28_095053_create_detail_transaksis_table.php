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
        Schema::create('tb_detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi');
            $table->foreignId('id_layanan');
            $table->smallInteger('berat');
            $table->integer('subtotal');
            $table->boolean('status_diambil');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('tb_transaksi');
            $table->foreign('id_layanan')->references('id')->on('tb_layanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail_transaksi');
    }
};
