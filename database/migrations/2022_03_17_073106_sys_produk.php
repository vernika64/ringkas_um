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
        Schema::create('sys_produk', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang')->unique();
            $table->string('nama_barang');
            $table->integer('kd_kategori');
            $table->text('deskripsi');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok_tersedia');
            $table->integer('total_nilai');
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
        Schema::dropIfExists('sys_produk');
    }
};
