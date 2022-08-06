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
        Schema::create('tb_jenis_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis', 64);
            $table->string('satuan', 64);
            $table->timestamps();
        });

        Schema::create('tb_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->smallInteger('estimasi_waktu');
            $table->integer('harga');
            $table->foreignId('id_jenis_layanan');
            $table->timestamps();

            $table->foreign('id_jenis_layanan')->references('id')->on('tb_jenis_layanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_layanan');
        Schema::dropIfExists('tb_jenis_layanan');
    }
};
