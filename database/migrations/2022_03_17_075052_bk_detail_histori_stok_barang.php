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
        Schema::create('bk_detail_histori_stok_barang', function (Blueprint $table) {
            $table->string('id_transaksi');
            $table->string('kd_barang');
            $table->integer('nilai_barang_satuan');
            $table->integer('total_nilai_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_detail_histori_stok_barang');
    }
};
