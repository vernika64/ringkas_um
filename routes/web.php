<?php

use App\Http\Controllers\Penjualan;
use App\Http\Controllers\Produk;
use App\Http\Controllers\UserAccount;
use Illuminate\Support\Facades\Route;

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

Route::post('beliBarang', [Pembelian::class, 'pembelianBarang']);

Route::post('jualBarang', [Penjualan::class, 'prosesPenjualan']);

Route::post('tesinput', [Penjualan::class, 'tesInput']);
