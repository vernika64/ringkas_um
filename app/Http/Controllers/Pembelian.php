<?php

namespace App\Http\Controllers;

use App\Models\SysProduk;
use App\Models\BkPersediaan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class Pembelian extends Controller
{
    public function pembelianBarang(Request $reg)
    {
        $barang     = $reg->kd_barang;
        $harga      = $reg->harga;
        $qty        = $reg->qty;

        try {
            $barangs = SysProduk::where('kd_produk', $barang)->first();

            if (isset($barangs) == null) {
                echo "Barang belum terdaftar!";
                return false;
            }

            $hitung_inv = BkPersediaan::where('tgl_transaksi', Carbon::now()->format('Y-m-d'))->count();

            $hasil_inv = $hitung_inv + 1;
            $kd_inv = $hasil_inv . "/INV/PB/" . Carbon::now();


            $isidata = new BkPersediaan;
            $isidata->kd_transaksi      = $kd_inv;
            $isidata->tipe_transaksi    = 'masuk';
            $isidata->kd_barang         = $barang;
            $isidata->qty_barang        = $qty;
            $isidata->harga_pokok_beli  = $harga;
            $isidata->tgl_transaksi     = Carbon::now();
            $isidata->waktu_transaksi   = Carbon::now();
            $isidata->kd_user           = 1;
            $isidata->save();

            $barangs->stok_tersedia = $barangs['stok_tersedia'] + $qty;
            $barangs->save();

            echo "Sukses";
        } catch (\Throwable $th) {
            echo "Error, " . $th->getMessage();
        }
    }
}
