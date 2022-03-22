<?php

namespace Database\Seeders;

use App\Models\SysKategoriProduk;
use App\Models\SysUser;
use App\Models\SysProduk;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Untuk Tabel SysUser

        SysUser::create([
            'username'      => 'admin',
            'password'      => Hash::make('admin'),
            'level'         => 0
        ]);

        SysUser::create([
            'username'      => 'user',
            'password'      => Hash::make('user'),
            'level'         => 1
        ]);

        // Untuk Tabel Kategori

        SysKategoriProduk::create([
            'nama_kategori'         => 'Air Minum',
            'deskripsi_kategori'    => 'Air Minum Kemasan',
            'tgl_dibuat'            => Carbon::now()
        ]);

        // Untuk Tabel Produk

        SysProduk::create([
            'kd_produk'             => 'AQ_GLN',
            'nama_produk'           => 'AQUA GALON',
            'kd_kategori'           => 1,
            'deskripsi'             => 'AQUA Galon isi 19L',
            'harga_beli'            => 0,
            'harga_jual'            => 0,
            'stok_tersedia'         => 0,
            'status'                => 0,
            'tgl_dibuat'            => Carbon::now(),
            'tgl_diupdate'          => Carbon::now(),
            'kd_user'               => 1
        ]);

        SysProduk::create([
            'kd_produk'             => 'AQ_600',
            'nama_produk'           => 'AQUA BOTOL SEDANG',
            'kd_kategori'           => 1,
            'deskripsi'             => 'AQUA Botol ukuran Sedang isi 600ml',
            'harga_beli'            => 0,
            'harga_jual'            => 0,
            'stok_tersedia'         => 0,
            'status'                => 0,
            'tgl_dibuat'            => Carbon::now(),
            'tgl_diupdate'          => Carbon::now(),
            'kd_user'               => 1
        ]);

        SysProduk::create([
            'kd_produk'             => 'AQ_1200',
            'nama_produk'           => 'AQUA BOTOL BESAR',
            'kd_kategori'           => 1,
            'deskripsi'             => 'AQUA Botol ukuran Besar isi 1 Liter',
            'harga_beli'            => 0,
            'harga_jual'            => 0,
            'stok_tersedia'         => 0,
            'status'                => 0,
            'tgl_dibuat'            => Carbon::now(),
            'tgl_diupdate'          => Carbon::now(),
            'kd_user'               => 1
        ]);

        SysProduk::create([
            'kd_produk'             => 'AQ_240',
            'nama_produk'           => 'AQUA Gelas 240ml',
            'kd_kategori'           => 1,
            'deskripsi'             => 'AQUA Gelas 240Ml isi 48 cup',
            'harga_beli'            => 0,
            'harga_jual'            => 0,
            'stok_tersedia'         => 0,
            'status'                => 0,
            'tgl_dibuat'            => Carbon::now(),
            'tgl_diupdate'          => Carbon::now(),
            'kd_user'               => 1
        ]);
    }
}
