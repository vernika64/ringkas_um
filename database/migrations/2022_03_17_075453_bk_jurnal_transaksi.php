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
        Schema::create('bk_jurnal_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kd_transaksi');
            $table->date('tgl_transaksi');
            $table->enum('jenis_transaksi', ['debit', 'kredit']);
            $table->integer('nominal_transaksi');
            $table->string('kd_akun');
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
        Schema::dropIfExists('bk_jurnal_transaksi');
    }
};
