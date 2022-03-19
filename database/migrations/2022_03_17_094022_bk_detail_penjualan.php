<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_detail_penjualan', function (Blueprint $table) {
            $table->string('kd_penjualan');
            $table->string('tgl_transaksi');
            $table->string('kd_barang');
            $table->integer('harga_satuan');
            $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_detail_penjualan');
    }
};
