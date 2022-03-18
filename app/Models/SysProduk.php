<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SysProduk extends Model
{
    use HasFactory;

    protected $table = 'sys_produk';

    public $timestamps = false;
}
