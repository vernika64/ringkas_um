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
        Schema::create('bk_besar', function (Blueprint $table) {
            $table->string('kd_akun')->unique();
            $table->string('nama_akun');
            $table->integer('nominal');
            $table->date('tgl_terakhir_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_besar');
    }
};
