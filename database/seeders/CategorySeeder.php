<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Role-Playing Game',
                'description' => 'A genre of video games where players assume the roles of characters in a fictional setting and take control over their actions and decisions.',
            ],
            [
                'name' => 'Action-Adventure',
                'description' => 'A genre that combines elements of both action and adventure games, often featuring exploration, puzzle-solving, and combat.',
            ],
            [
                'name' => 'Strategy',
                'description' => 'A genre that emphasizes strategic thinking and planning, where players must manage resources, build structures, and command units to achieve victory.',
            ],
            [
                'name' => 'Simulation',
                'description' => 'A genre that simulates real-world activities or systems, allowing players to experience and interact with them in a virtual environment.',
            ],
            [
                'name' => 'Sports',
                'description' => 'A genre that simulates real-world sports, allowing players to compete in various athletic activities and tournaments.',
            ],
            [
                'name' => 'Puzzle',
                'description' => 'A genre that challenges players to solve puzzles or problems, often requiring logic, pattern recognition, and critical thinking.',
            ],
            [
                'name' => 'Horror',
                'description' => 'A genre that aims to create a sense of fear, suspense, and tension, often featuring dark and eerie atmospheres, supernatural elements, and psychological themes.',
            ],
            [
                'name' => 'Racing',
                'description' => 'A genre that focuses on competitive racing, where players control vehicles and compete against others in various tracks and environments.',
            ],
            [
                'name' => 'Fighting',
                'description' => 'A genre that centers around close combat between characters, often featuring a variety of moves, combos, and special abilities.',
            ],
            [
                'name' => 'Platformer',
                'description' => 'A genre that involves navigating a character through a series of platforms and obstacles, often requiring precise timing and coordination.',
            ]
        ]);
    }
}
