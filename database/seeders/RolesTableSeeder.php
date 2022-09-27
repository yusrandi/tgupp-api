<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'Admin',
            'Pegawai',
        ]);
        $roles->each(function ($item) {
            Role::create([
                'name' => $item,
            ]);
        });
    }
}
