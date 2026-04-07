<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trackables')->insert([
            [
                'game_id' => 1,
                'quest_id' => 1,
                'type' => 'achievement',
                'name' => 'Complete the game',
                'description' => 'Slay the boss and complete the game.',
                'unlockRequirement' => 'Complete the game',
            ],
            [
                'game_id' => 1,
                'quest_id' => 2,
                'type' => 'achievement',
                'name' => 'Help the old man',
                'description' => 'Help the old man with his quest.',
                'unlockRequirement' => 'Help the old man',
            ],
            [
                'game_id' => 2,
                'quest_id' => 3,
                'type' => 'collectable',
                'name' => 'Find the secret treasure',
                'description' => 'Find the hidden treasure in the game.',
                'unlockRequirement' => 'Find the treasure',
            ],
            [
                'game_id' => 2,
                'quest_id' => 4,
                'type' => 'secret',
                'name' => 'Find the hidden armour',
                'description' => 'Find the hidden armour in the game.',
                'unlockRequirement' => 'Find the hidden armour',
            ]
        ]);
    }
}
