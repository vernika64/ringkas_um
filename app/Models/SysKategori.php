<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysKategori extends Model
{
    use HasFactory;

    protected $table = 'sys_kategori_produk';

    public $timestamps = false;
}
