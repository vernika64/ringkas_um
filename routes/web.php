<?php

use App\Http\Controllers\Penjualan;
use App\Http\Controllers\Produk;
use App\Http\Controllers\Pembelian;
use App\Http\Controllers\UserAccount;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('teslogin', [UserAccount::class, 'viewLogin']);

Route::post('login', [UserAccount::class, 'prosesLogin']);

Route::post('daftarakun', [UserAccount::class, 'daftarUser']);

Route::post('tambahproduk', [Produk::class, 'tambahProdukItem']);

Route::post('tambahkategoriproduk', [Produk::class, 'tambahProdukKategori']);

Route::post('belibarang', [Pembelian::class, 'pembelianBarang']);

Route::post('jualbarang', [Penjualan::class, 'prosesPenjualan']);

Route::get('tes', function () {
    echo Carbon::now()->format('Y-m-d');
});
