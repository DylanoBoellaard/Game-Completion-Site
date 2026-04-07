<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Game_PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Edit game & category ID's to correct values
        DB::table('game_categories')->insert([
            [
                'game_id' => 1,
                'category_id' => 1,
            ],
            [
                'game_id' => 2,
                'category_id' => 2,
            ],
            [
                'game_id' => 3,
                'category_id' => 4,
            ],
            [
                'game_id' => 4,
                'category_id' => 3,
            ],
            [
                'game_id' => 5,
                'category_id' => 1,
            ],
            [
                'game_id' => 6,
                'category_id' => 5,
            ],
            [
                'game_id' => 7,
                'category_id' => 2,
            ]
        ]);

        DB::table('game_platforms')->insert([
            [
                'game_id' => 1,
                'platform_id' => 1,
            ],
            [
                'game_id' => 2,
                'platform_id' => 3,
            ],
            [
                'game_id' => 3,
                'platform_id' => 6,
            ],
            [
                'game_id' => 4,
                'platform_id' => 7,
            ],
            [
                'game_id' => 5,
                'platform_id' => 1,
            ],
            [
                'game_id' => 6,
                'platform_id' => 9,
            ],
            [
                'game_id' => 7,
                'platform_id' => 10,
            ]
        ]);
    }
}
