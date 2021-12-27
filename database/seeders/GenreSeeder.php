<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([

            [
                "id" => 1,
                "name" => 'action'
            ],
            [
                "id" => 2,
                "name" => 'horror'
            ],
            [
                "id" => 3,
                "name" => 'comedy'
            ],
            [
                "id" => 4,
                "name" => 'thriller'
            ],
            [
                "id" => 5,
                "name" => 'children'
            ],
            [
                "id" => 6,
                "name" => 'mystery'
            ],
            [
                "id" => 7,
                "name" => 'education'
            ],
            [
                "id" => 8,
                "name" => 'sci-fi'
            ],
            [
                "id" => 9,
                "name" => 'fiction'
            ],
            [
                "id" => 10,
                "name" => 'fantasy'
            ]

        ]);
    }
}
