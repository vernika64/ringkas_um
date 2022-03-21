<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysKategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'sys_kategori_produk';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'air_minum_kemasan',
        'tgl_dibuat'
    ];
}
