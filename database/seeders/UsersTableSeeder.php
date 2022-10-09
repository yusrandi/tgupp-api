<?php

namespace Database\Seeders;

use App\Models\Employment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname' => 'admin',
            'role_id' => '1',
            'employment_id' => '1',
            'title_id' => '1',
            'email' => 'use@use.use',
            'password' => Hash::make('87654321'),
        ]);
    }
}
