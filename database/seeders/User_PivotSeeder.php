<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User_PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_games')->insert([
            [
                'user_id' => 1,
                'game_id' => 1,
                'status' => 'completed',
                'completion_date' => '2023-03-01',
                'playtime' => 60000,
                'notes' => 'Completed the game.',
            ],
            [
                'user_id' => 1,
                'game_id' => 2,
                'status' => 'in_progress',
                'completion_date' => null,
                'playtime' => 20000,
                'notes' => 'Currently playing the game.',
            ],
            [
                'user_id' => 1,
                'game_id' => 3,
                'status' => 'on_hold',
                'completion_date' => null,
                'playtime' => 600,
                'notes' => 'On hold for a while.',
            ],
            [
                'user_id' => 1,
                'game_id' => 4,
                'status' => 'not_started',
                'completion_date' => null,
                'playtime' => 0,
                'notes' => 'Not started playing the game.',
            ],
            [
                'user_id' => 1,
                'game_id' => 6,
                'status' => 'completed',
                'completion_date' => '2023-03-01',
                'playtime' => 75515,
                'notes' => 'Completed the game.',
            ]
        ]);

        DB::table('user_quests')->insert([
            [
                'user_id' => 1,
                'quest_id' => 1,
                'status' => 'completed',
                'completion_date' => '2023-03-01',
                'progress_percentage' => 100,
                'notes' => 'Completed the quest.',
            ],
            [
                'user_id' => 1,
                'quest_id' => 2,
                'status' => 'in_progress',
                'completion_date' => null,
                'progress_percentage' => 50,
                'notes' => 'Currently working on the quest.',
            ],
            [
                'user_id' => 1,
                'quest_id' => 3,
                'status' => 'on_hold',
                'completion_date' => null,
                'progress_percentage' => 25,
                'notes' => 'On hold for a while.',
            ],
            [
                'user_id' => 1,
                'quest_id' => 4,
                'status' => 'not_started',
                'completion_date' => null,
                'progress_percentage' => 0,
                'notes' => 'Not started working on the quest.',
            ]
        ]);

        DB::table('user_trackables')->insert([
            [
                'user_id' => 1,
                'trackable_id' => 1,
                'status' => 'completed',
                'completion_date' => '2023-03-01',
                'progress_percentage' => 100,
                'notes' => 'Completed the trackable.',
            ],
            [
                'user_id' => 1,
                'trackable_id' => 2,
                'status' => 'in_progress',
                'completion_date' => null,
                'progress_percentage' => 50,
                'notes' => 'Currently working on the trackable.',
            ],
            [
                'user_id' => 1,
                'trackable_id' => 3,
                'status' => 'on_hold',
                'completion_date' => null,
                'progress_percentage' => 25,
                'notes' => 'On hold for a while.',
            ],
            [
                'user_id' => 1,
                'trackable_id' => 4,
                'status' => 'not_started',
                'completion_date' => null,
                'progress_percentage' => 0,
                'notes' => 'Not started working on the trackable.',
            ]
        ]);
    }
}
