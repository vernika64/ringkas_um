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
        Schema::create('bk_kecil_kas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_transaksi'); // RAND|TIPE TRANSAKSI|BLNTHN
            $table->string('deskripsi_transaksi');
            $table->string('jenis_transaksi');
            $table->integer('nominal_transaksi');
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
        Schema::dropIfExists('bk_kecil_kas');
    }
};
