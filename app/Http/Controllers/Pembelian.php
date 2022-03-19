<?php

namespace App\Http\Controllers;

use App\Models\SysProduk;
use App\Models\BkPersediaan;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class Pembelian extends Controller
{
    public function pembelianBarang(Request $reg)
    {
        $barang     = $reg->input('kd_barang');
        $harga      = $reg->input('harga');
        $qty        = $reg->input('qty');

        try {
            $barangs = SysProduk::where('kd_produk', $barang)->first();

            if (isset($barangs) == null) {
                echo "Barang belum terdaftar!";
                return false;
            }

            BkPersediaan::create([
                'kd_transaksi'      => Hash::make(Carbon::now()),
                'tipe_transaksi'    => 'masuk',
                'kd_barang'         => $barang,
                'qty_barang'        => $qty,
                'harga_pokok_beli'  => $harga,
                'tgl_transaksi'     => Carbon::now(),
                'kd_user'           => 1
            ]);

            $barangs->stok_tersedia = $barangs['stok_tersedia'] + $qty;
            $barangs->save();

            echo "Sukses";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
