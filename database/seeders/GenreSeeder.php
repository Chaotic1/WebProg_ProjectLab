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
                "name" => 'Action'
            ],
            [
                "id" => 2,
                "name" => 'Horror'
            ],
            [
                "id" => 3,
                "name" => 'Comedy'
            ],
            [
                "id" => 4,
                "name" => 'Thriller'
            ],
            [
                "id" => 5,
                "name" => 'Children'
            ],
            [
                "id" => 6,
                "name" => 'Mystery'
            ],
            [
                "id" => 7,
                "name" => 'Education'
            ],
            [
                "id" => 8,
                "name" => 'Sci-fi'
            ],
            [
                "id" => 9,
                "name" => 'Fiction'
            ],
            [
                "id" => 10,
                "name" => 'Fantasy'
            ]

        ]);
    }
}
