<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkPersediaan extends Model
{
    use HasFactory;

    protected $table = 'bk_histori_stok_barang';

    public $timestamps = false;

    protected $fillable = [
        'kd_transaksi',
        'tipe_transaksi',
        'kd_barang',
        'qty_barang',
        'harga_pokok_beli',
        'tgl_transaksi',
        'kd_user'
    ];
}
