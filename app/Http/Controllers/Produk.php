<?php

namespace App\Http\Controllers;

use App\Models\SysKategoriProduk;
use App\Models\SysProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Produk extends Controller
{
    public function tambahProdukItem(Request $reg)
    {
        $kd_produk              = $reg->kode;
        $nama_produk            = $reg->nama;
        $kode_kategori          = $reg->kategori;
        $deskripsi              = $reg->desc;

        try {
            $inputproduk = new SysProduk;

            $inputproduk->kd_produk              = $kd_produk;
            $inputproduk->nama_produk            = $nama_produk;
            $inputproduk->kd_kategori            = $kode_kategori;
            $inputproduk->deskripsi              = $deskripsi;
            $inputproduk->harga_beli             = 0;
            $inputproduk->harga_jual             = 0;
            $inputproduk->stok_tersedia          = 0;
            $inputproduk->kd_user                = 1;

            $inputproduk->save();

            echo "Sukses, " . $nama_produk . " berhasil ditambahkan";
        } catch (\Throwable $th) {
            echo "Gagal, " . $th->getMessage();
        }
    }

    public function tambahProdukKategori(Request $req)
    {
        $nm_produk = $req->nama;
        $ds_produk = $req->deskripsi;

        try {
            $inputdata = new SysKategoriProduk;

            $inputdata->nama_kategori           = $nm_produk;
            $inputdata->deskripsi_kategori      = $ds_produk;
            $inputdata->tgl_dibuat              = Carbon::now();
            $inputdata->save();

            echo "Sukses";
        } catch (\Throwable $th) {
            echo "Gagal, " . $th->getMessage();
        }
    }
}
