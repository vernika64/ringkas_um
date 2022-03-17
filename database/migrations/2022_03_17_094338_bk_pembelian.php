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
        Schema::create('bk_pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pembelian');
            $table->date('tgl_transaksi');
            $table->integer('total_transaksi');
            $table->integer('nominal_bayar');
            $table->integer('kembalian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_pembelian');
    }
};
