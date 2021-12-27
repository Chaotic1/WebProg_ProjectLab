<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'id' => 1,
                'title' => 'Python Crash Course: A Hands-On, Project-Based Introduction to Programming',
                'author' => 'Eric Matthes',
                'description' => 'Python for Beginners',
                'price' => 10000,
                'cover' => 'images/Python-Crash-Course.jpg' 
            ],
            [
                'id' => 2,
                'title' => 'Fate/Requiem',
                'author' => 'Meteo Hoshizora',
                'description' => 'Fate Novel',
                'price' => 50000,
                'cover' => 'images/fate-requiem.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Head-First Python: A Brain-Friendly Guide',
                'author' => 'Paul Barry',
                'description' => 'Python for Beginners, again',
                'price' => 27000,
                'cover' => 'images/Head-First-Python.jpg' 
            ],
            [
                'id' => 4,
                'title' => 'Learn Python the Hard Way: 3rd Edition',
                'author' => 'Zed A. Shaw',
                'description' => 'Another Python Book',
                'price' => 30000,
                'cover' => 'images/Learn-Python-the-Hard-Way.jpg'
            ],
            [
                'id' => 5,
                'title' => 'Python Programming: An Introduction to Computer Science',
                'author' => 'John M. Zelle',
                'description' => 'More Python for Beginners',
                'price' => 55000,
                'cover' => 'images/Python-Programming.jpg' 
            ],
            [
                'id' => 6,
                'title' => 'Katanagatari',
                'author' => 'Nisio Isin',
                'description' => 'Sword Tale',
                'price' => 50000,
                'cover' => 'images/Katanagatari.jpg'
            ],
            [
                'id' => 7,
                'title' => 'The Rising of The Shield Hero',
                'author' => 'Aneko Yusagi',
                'description' => 'Betrayal and Fantasy',
                'price' => 20000,
                'cover' => 'images/The-Rising-of-the-Shield-Hero.jpg' 
            ],
            [
                'id' => 8,
                'title' => 'That Time I Got Reincarnated as a Slime',
                'author' => 'Fuse',
                'description' => 'Slime...',
                'price' => 100000,
                'cover' => 'images/That-Time-I-Got-Reincarnated-as-a-Slime.jpg'
            ],
            [
                'id' => 9,
                'title' => 'The Saga of Tanya the Evil',
                'author' => 'Carlo Zen',
                'description' => 'Failed German Artist, but anime',
                'price' => 70000,
                'cover' => 'images/The-Saga-of-Tanya-the-Evil.jpg' 
            ],
            [
                'id' => 10,
                'title' => 'Fluent Python: Clear, Concise, and Effective Programming',
                'author' => 'Luciano Ramalho',
                'description' => 'Python, but hard',
                'price' => 50000,
                'cover' => 'images/Fluent-Python.jpg'
            ]
        ]);
    }
}
