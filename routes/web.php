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

// Area User Account

Route::get('teslogin', [UserAccount::class, 'viewLogin']);

Route::post('login', [UserAccount::class, 'prosesLogin']);

Route::post('daftarakun', [UserAccount::class, 'daftarUser']);

// Untuk bagian produk

Route::get('produk/', [Produk::class, 'lihatProdukAll']);

Route::get('produk/{id}', [Produk::class, 'lihatProdukById']);

Route::post('produk/tambahProduk', [Produk::class, 'tambahProdukItem']);

Route::post('produk/tambahKategoriProduk', [Produk::class, 'tambahProdukKategori']);

Route::put('produk/editProduk/{id}', [Produk::class, 'editProduk']);

Route::delete('produk/hapusProduk/{id}', [Produk::class, 'hapusProduk']);

// Untuk Bagian Transaksi

Route::post('belibarang', [Pembelian::class, 'pembelianBarang']);

Route::post('jualbarang', [Penjualan::class, 'prosesPenjualan']);
