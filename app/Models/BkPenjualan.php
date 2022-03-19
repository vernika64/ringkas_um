<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkPenjualan extends Model
{
    use HasFactory;

    protected $table = 'bk_penjualan';

    public $timestamps = false;

    protected $fillable = [
        'kd_penjualan',
        'tgl_transaksi',
        'total_transaksi',
        'nominal_bayar',
        'kembalian'
    ];
}
