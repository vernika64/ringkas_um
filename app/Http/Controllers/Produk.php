<?php

namespace App\Http\Controllers;

use App\Models\SysKategoriProduk;
use App\Models\SysProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Produk extends Controller
{
    public function lihatProdukAll()
    {
        $produk = SysProduk::join('sys_kategori_produk', 'sys_produk.kd_kategori', '=', 'sys_kategori_produk.id')->get();

        foreach ($produk as $e) {
            echo $e['kd_produk'] . '<br>';
            echo $e['nama_produk'] . '<br>';
            echo $e['nama_kategori'] . '<br>';
            echo $e['stok_tersedia'] . '<br>';
            echo $e['harga_jual'] . '<br><br>';
        }
    }

    public function lihatProdukById($id)
    {

        $produk = SysProduk::where('kd_produk', $id)->join('sys_kategori_produk', 'sys_produk.kd_kategori', '=', 'sys_kategori_produk.id')->get();

        if ($produk->isEmpty()) {
            echo "Data tidak ditemukan";
            return false;
        }

        foreach ($produk as $e) {
            echo $e['kd_produk'] . '<br>';
            echo $e['nama_produk'] . '<br>';
            echo $e['nama_kategori'] . '<br>';
            echo $e['stok_tersedia'] . '<br>';
            echo $e['harga_jual'] . '<br><br>';
        }
    }

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
            $inputproduk->status                 = false;
            $inputproduk->kd_user                = 1;

            $inputproduk->save();

            echo "Sukses, " . $nama_produk . " berhasil ditambahkan";
        } catch (\Throwable $th) {
            echo "Gagal, " . $th->getMessage();
        }
    }


    public function editProduk($id, Request $re)
    {
        $data = SysProduk::find($id);

        $data->nama_produk      = $re->nama;
        $data->kd_kategori      = $re->kategori;
        $data->deskripsi        = $re->desc;
        $data->harga_beli       = $re->hg_beli;
        $data->harga_jual       = $re->hg_jual;
        $data->status           = $re->status;
        $data->kd_user          = '1';

        $data->save();

        echo "Data " . $data->nama_produk . " telah berhasil diedit";
    }

    public function hapusProduk($id)
    {
        try {
            $data = SysProduk::find($id);
            $data->delete();

            echo 'Data berhasil dihapus';
        } catch (\Throwable $th) {
            echo 'Error' . $th->getMessage();
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
