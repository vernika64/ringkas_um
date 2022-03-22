<?php

namespace App\Http\Controllers;

use App\Models\SysProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SysKategoriProduk;
use Symfony\Component\HttpFoundation\Response;

class Produk extends Controller
{
    public function lihatProdukAll()
    {
        try {
            $produk = SysProduk::join('sys_kategori_produk', 'sys_produk.kd_kategori', '=', 'sys_kategori_produk.id')->get();

            return response()->json([
                'message'       => 'Data berhasil diambil',
                'data'          => $produk
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function lihatProdukById($id)
    {
        try {
            $produk = SysProduk::where('kd_produk', $id)->join('sys_kategori_produk', 'sys_produk.kd_kategori', '=', 'sys_kategori_produk.id')->get();

            if ($produk->isEmpty()) {
                echo "Data tidak ditemukan";
                return false;
            }

            return response()->json([
                'message'       => 'Data berhasil dicari',
                'data'          => $produk
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function tambahProdukItem(Request $reg)
    {
        try {
            $kd_produk              = $reg->kode;
            $nama_produk            = $reg->nama;
            $kode_kategori          = $reg->kategori;
            $deskripsi              = $reg->desc;

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

            return response()->json([
                'message'       => 'Data berhasil ditambahkan',
                'data'          => $inputproduk
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function editProduk($id, Request $re)
    {
        try {
            $data = SysProduk::find($id);

            $data->nama_produk      = $re->nama;
            $data->kd_kategori      = $re->kategori;
            $data->deskripsi        = $re->desc;
            $data->harga_beli       = $re->hg_beli;
            $data->harga_jual       = $re->hg_jual;
            $data->status           = $re->status;
            $data->kd_user          = '1';

            $data->save();

            return response()->json([
                'message'       => 'Data berhasil diedit',
                'data'          => $data
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function hapusProduk($id)
    {
        try {
            $data = SysProduk::find($id);
            $data->delete();

            return response()->json([
                'message'           => 'Data berhasil dihapus',
                'data'              => $data
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
