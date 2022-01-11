<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Dondo',
             'email' => 'dondo@gmail.com',
             'password' => bcrypt('12341234'),
             'role' => 'admin'
            ],
            ['name' => 'Sena',
             'email' => 'sena@gmail.com',
             'password' => bcrypt('12341234'),
             'role' => 'member'
            ]
        ]);
    }
}
