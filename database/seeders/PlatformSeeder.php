<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platforms')->insert([
            [
                'name' => 'PC',
                'description' => 'Personal Computer',
            ],
            [
                'name' => 'Mac',
                'description' => 'Apple Macintosh',
            ],
            [
                'name' => 'Linux',
                'description' => 'Linux Operating System',
            ],

            // Mobile
            [
                'name' => 'iOS',
                'description' => 'Apple iOS',
            ],
            [
                'name' => 'Android',
                'description' => 'Google Android',
            ],

            // Playstation
            [
                'name' => 'PlayStation 5',
                'description' => 'Sony PlayStation 5',
            ],
            [
                'name' => 'PlayStation 4',
                'description' => 'Sony PlayStation 4',
            ],
            [
                'name' => 'PlayStation 3',
                'description' => 'Sony PlayStation 3',
            ],
            [
                'name' => 'PlayStation 2',
                'description' => 'Sony PlayStation 2',
            ],
            [
                'name' => 'PlayStation 1',
                'description' => 'Sony PlayStation 1',
            ],

            // Xbox
            [
                'name' => 'Xbox Series X',
                'description' => 'Microsoft Xbox Series X',
            ],
            [
                'name' => 'Xbox One',
                'description' => 'Microsoft Xbox One',
            ],
            [
                'name' => 'Xbox 360',
                'description' => 'Microsoft Xbox 360',
            ],
            [
                'name' => 'Xbox Original',
                'description' => 'Microsoft Xbox Original',
            ],

            // Nintendo
            [
                'name' => 'Switch 2',
                'description' => 'Nintendo Switch 2',
            ],
            [
                'name' => 'Switch',
                'description' => 'Nintendo Switch',
            ],
            [
                'name' => '3DS',
                'description' => 'Nintendo 3DS',
            ],
            [
                'name' => 'DS',
                'description' => 'Nintendo DS',
            ],
            [
                'name' => 'Wii U',
                'description' => 'Nintendo Wii U',
            ],
            [
                'name' => 'Wii',
                'description' => 'Nintendo Wii',
            ],
            [
                'name' => 'GameCube',
                'description' => 'Nintendo GameCube',
            ],
            [
                'name' => 'Nintendo 64',
                'description' => 'Nintendo 64',
            ],
            [
                'name' => 'Game Boy Advance',
                'description' => 'Nintendo Game Boy Advance',
            ],
            [
                'name' => 'Game Boy (color)',
                'description' => 'Nintendo Game Boy (color)',
            ],
            [
                'name' => 'Super Nintendo Entertainment System',
                'description' => 'Super Nintendo Entertainment System',
            ],
            [
                'name' => 'Nintendo Entertainment System',
                'description' => 'Nintendo Entertainment System',
            ]
        ]);
    }
}
