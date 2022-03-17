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
        Schema::create('bk_histori_stok_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_transaksi');
            $table->enum('tipe_transaksi', ['masuk', 'keluar']);
            $table->integer('qty_barang');
            $table->dateTime('tgl_transaksi');
            $table->integer('kd_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_histori_stok_barang');
    }
};
