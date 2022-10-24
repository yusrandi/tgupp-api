<?php

namespace Database\Seeders;

use App\Models\Employment;
use Illuminate\Database\Seeder;

class EmploymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Employment::create([
            'name' => 'Admin',
            'salary' => 'Rp 10.000.000',
        ]);
    }
}
