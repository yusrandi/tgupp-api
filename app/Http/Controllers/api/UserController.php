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

        $login = User::with('title')
            ->where(['email' => $email, 'role_id' => 2])
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

                $update = User::find($login->id)->update([
                    'remember_token' => $request->token,
                    // 'email_verified_at' => $request->token,
                ]);

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

    public function profile($id)
    {
        $user = User::with('title')->find($id);
        return response()->json([
            'responsecode' => '1',
            'responsemsg' => 'Selamat datang',
            'user' => $user
        ], 201);
    }
}
