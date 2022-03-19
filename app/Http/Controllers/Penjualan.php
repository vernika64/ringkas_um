<?php

namespace App\Http\Controllers;

use App\Models\BkPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Penjualan extends Controller
{
    public function prosesPenjualanPOS(Request $req)
    {
        $totaldata      = $req->input('data');

        $totalharga     = $req->input('total_transaksi');
        $totalbayar     = $req->input('nominal_bayar');
        $kembalian      = $req->input('kembalian');

        try {

            BkPenjualan::create([
                'tgl_transaksi'         => Carbon::now(),
                'total_transaksi'       => $totalharga,
                'nominal_bayar'         => $totalbayar,
                'kembalian'             => $kembalian
            ]);

            for ($count = 1; $count <= $totalbayar; $count++) {
                $barang                 = $req->input('kdbarang-' . $count);
                $qty                    = $req->input('qty' . $count);
                $hargasatuan            = $req->input('harga' . $count);
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function tesLooping(Request $r)
    {
        $row = $r->input('totalkolom');
        $num = (int) $row;

        for ($c = 1; $c <= $num; $c++) {
            echo $c;
        }
    }
}
