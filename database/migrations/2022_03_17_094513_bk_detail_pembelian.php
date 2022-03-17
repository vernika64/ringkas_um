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
        Schema::create('bk_detail_pembelian', function (Blueprint $table) {
            $table->string('kd_pembelian');
            $table->string('tgl_transaksi');
            $table->string('kd_barang');
            $table->integer('harga_satuan');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_detail_pembelian');
    }
};
