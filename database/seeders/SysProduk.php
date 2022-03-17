<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SysProduk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sys_produk')->insert([


            'kd_barang'         => 'AQ_600',
            'nama_barang'       => 'AQUA Botol 600ml',
            'kd_kategori'       => 1,
            'deskripsi'         => 'AQUA Botol 600ml',
            'harga_beli'        => 35000,
            'harga_jual'        => 40000,
            'stok_tersedia'     => 100,
            'total_nilai'       => 3500000,
            'kd_user'           => 0

        ]);
    }
}
