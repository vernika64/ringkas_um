<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SysUser;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Provider\Dce\SystemDceSecurityProvider;

class UserAccount extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');

        $caridata = SysUser::where('username', $user)->first();
        $unhash = Hash::check($pass, $caridata['password']);

        if ($pass == $unhash) {
            echo "Sukses!";
        } else {
            echo "Gagal";
        }
    }

    public function daftarUser(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');


        $query = SysUser::where('username', $user)->first();

        if (isset($query['username']) != NULL) {
            echo "Username sudah terdaftar";
            return false;
        }

        try {

            $data = [
                'username' => $user,
                'password' => Hash::make($pass),
                'level' => 0
            ];

            $insert = SysUser::create($data);
            $insert->save();
            echo "Sukses";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
