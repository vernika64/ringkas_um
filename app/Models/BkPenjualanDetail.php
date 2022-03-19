<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkPenjualanDetail extends Model
{
    use HasFactory;

    protected $table = 'bk_detail_penjualan';

    public $timestamps = false;

    protected $fillable = [
        'kd_penjualan',
        'tgl_transaksi',
        'kd_barang',
        'harga_satuan',
        'qty'
    ];
}
