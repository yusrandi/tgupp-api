<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function create()
    {
        return view('user-form', [
            'user' => new User()
        ]);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-form', [
            'user' => $user
        ]);
    }
}
