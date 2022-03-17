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
        Schema::create('sys_identitas_pemilik', function (Blueprint $table) {
            $table->string('nama_pemilik');
            $table->enum('status_pemilik', ['Pemilik', 'Pemilik dan Penanggung Jawab']);
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->boolean('status_disabilitas');
            $table->enum('status_pendidikan', ['SD', 'SMP', 'SMA/SMK/MA', 'Perguruan Tinggi']);
            $table->integer('umur');
            $table->integer('nik');
            $table->string('npwp');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_identitas_pemilik');
    }
};
