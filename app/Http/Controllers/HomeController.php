<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jabatan = count(Employment::all());
        $pegawai = count(User::where('role_id', 2)->get());
        $admin = count(User::where('role_id', 1)->get());
        $rapat = count(Meet::all());

        return view('home', [
            'data' => Meet::orderby('begin', 'asc')->get(),
            'jabatan' => $jabatan,
            'pegawai' => $pegawai,
            'admin' => $admin,
            'rapat' => $rapat,

        ]);
    }
}
