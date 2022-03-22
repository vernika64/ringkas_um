<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SysKategoriProduk;
use LDAP\Result;
use Symfony\Component\HttpFoundation\Response;

class Kategori extends Controller
{
    public function lihatKategoriAll()
    {
        try {
            $kategori = SysKategoriProduk::get();

            return response()->json([
                'message'           => 'Data berhasil diambil',
                'data'              => $kategori
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function lihatKategoriById($id)
    {
        try {
            $cat = SysKategoriProduk::find($id);

            return response()->json([
                'message'       => 'Data berhasil dicari',
                'data'          => $cat
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function tambahKategori(Request $req)
    {
        try {
            $inputdata = new SysKategoriProduk;

            $inputdata->nama_kategori           = $req->nama;
            $inputdata->deskripsi_kategori      = $req->desc;
            $inputdata->tgl_dibuat              = Carbon::now();
            $inputdata->save();

            return response()->json([
                'message'           => 'Kategori berhasil ditambahkan',
                'data'              => $inputdata
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editKategori($id, Request $req)
    {
        try {
            $cat = SysKategoriProduk::find($id);

            $cat->nama_kategori         = $req->nama;
            $cat->deskripsi_kategori    = $req->desc;
            $cat->save();

            return response()->json([
                'message'               => 'Kategori Berhasil diedit',
                'data'                  => $cat
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function hapusKategori($id)
    {
        try {
            $cat = SysKategoriProduk::find($id);
            $cat->delete();

            return response()->json([
                'message'           => 'Kategori berhasil dihapus',
                'data'              => $cat
            ]);
        } catch (\Exception $e) {
            return response([
                'message'       => 'server error',
                'detail'        => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
