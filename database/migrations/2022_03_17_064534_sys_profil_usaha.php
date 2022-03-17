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
        Schema::create('sys_profil_usaha', function (Blueprint $table) {
            $table->string('nama_usaha_full');
            $table->string('nama_usaha_kom');
            $table->string('kegiatan_usaha');
            $table->enum('produk', ['produk', 'jasa']);
            $table->string('alamat_lengkap');
            $table->text('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_profil_usaha');
    }
};
