<?php

namespace App\Http\Controllers;

use App\Models\BkPenjualan;
use App\Models\BkPenjualanDetail;
use App\Models\BkPersediaan;
use App\Models\SysProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Penjualan extends Controller
{
    public function prosesPenjualan(Request $req)
    {
        $totaldata      = $req->input('data');

        $totalharga     = $req->input('total_transaksi');
        $totalbayar     = $req->input('nominal_bayar');
        $kembalian      = $req->input('kembalian');

        try {

            $hitung_inv = BkPersediaan::where('tgl_transaksi', Carbon::now()->format('Y-m-d'))->count();

            $hasil_inv = $hitung_inv + 1;
            $kd_inv = $hasil_inv . "/INV/PB/" . Carbon::now();

            BkPenjualan::create([
                'kd_penjualan'          => $kd_inv,
                'tgl_transaksi'         => Carbon::now(),
                'total_transaksi'       => $totalharga,
                'nominal_bayar'         => $totalbayar,
                'kembalian'             => $kembalian
            ]);

            for ($count = 1; $count <= $totaldata; $count++) {
                $barang                 = $req->input('kdbarang-' . $count);
                $qty                    = $req->input('qty-' . $count);
                $hargasatuan            = $req->input('harga-' . $count);

                $caribarang             = SysProduk::where('kd_produk', $barang)->first();

                $hitungstokbarang       = $caribarang['stok_tersedia'] - $qty;

                if ($hitungstokbarang <= 0) {
                    echo "Stok barang " . $caribarang->nama_produk . " habis / tidak cukup <br>";
                } else {

                    BkPenjualanDetail::create([
                        'kd_penjualan'  => $kd_inv,
                        'tgl_transaksi' => Carbon::now(),
                        'kd_barang'     => $barang,
                        'harga_satuan'  => $hargasatuan,
                        'qty'           => $qty
                    ]);

                    SysProduk::where('kd_produk', $barang)
                        ->update(['stok_tersedia' => $hitungstokbarang]);

                    echo "Barang " . $caribarang->nama_produk . " Berhasil ditambahkan <br>";
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function tesInput(Request $r)
    {
        $data = $r->input('data');

        for ($x = 1; $x <= $data; $x++) {
            $qty         = $r->input('qty-' . $x);
            $harga       = $r->input('harga-' . $x);

            echo $x;
        }
    }
}
