<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {

        // return $request;
        $hasher = app()->make('hash');
        $password = $request->password;
        $email = $request->email;

        $login = User::where(['email' => $email, 'role_id' => 2])
            // ->where('hak_akses', '!=', 1)
            // ->orwhere('hak_akses', 3)
            ->first();

        if (!$login) {
            return response()->json([
                'responsecode' => '0',
                'responsemsg' => 'Maaf Nomor anda tidak terdaftar',

            ], 201);
        } else {
            if ($hasher->check($password, $login->password)) {
                return response()->json([
                    'responsecode' => '1',
                    'responsemsg' => 'Selamat datang',
                    'user' => $login
                ], 201);
            } else {
                return response()->json([
                    'responsecode' => '0',
                    'responsemsg' => 'Maaf password anda salah',

                ], 201);
            }
        }
    }
}
