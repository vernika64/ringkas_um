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
            $table->string('kd_produk')->unique();
            $table->string('nama_produk');
            $table->integer('kd_kategori');
            $table->text('deskripsi');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok_tersedia');
            $table->boolean('status');
            $table->datetime('tgl_dibuat');
            $table->datetime('tgl_diupdate');
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
