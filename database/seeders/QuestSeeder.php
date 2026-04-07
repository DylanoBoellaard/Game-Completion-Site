<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quests')->insert([
            [
                'game_id' => 1,
                'type' => 'main',
                'name' => 'Complete the game',
                'description' => 'Slay the boss and complete the game.',
            ],
            [
                'game_id' => 1,
                'type' => 'side',
                'name' => 'Help the old man',
                'description' => 'Help the old man with his quest.',
            ],
            [
                'game_id' => 2,
                'type' => 'main',
                'name' => 'Find the treasure',
                'description' => 'Find the hidden treasure in the game.',
            ],
            [
                'game_id' => 2,
                'type' => 'side',
                'name' => 'Collect 100 coins',
                'description' => 'Collect 100 coins scattered throughout the game.',
            ],
            [
                'game_id' => 6, // Skyrim
                'type' => 'main',
                'name' => 'Dragonslayer',
                'description' => 'Defeat the world-eater dragon Alduin and save the world.',
            ],
            [
                'game_id' => 6, // Skyrim
                'type' => 'side',
                'name' => 'Glory of the Dead',
                'description' => 'Cute Kodlak\'s spirit and become Harbinger of the Companions.',
            ],
            [
                'game_id' => 7, // Oblivion
                'type' => 'main',
                'name' => 'Light the Dragonfires',
                'description' => 'Escort Martin Septim to the Temple of the One and light the Dragonfires to save Tamriel from Oblivion.',
            ],
            [
                'game_id' => 7, // Oblivion
                'type' => 'side',
                'name' => 'The Fighter\'s Guild',
                'description' => 'Join the Fighter\'s Guild and rise through the ranks.',
            ],
            [
                'game_id' => 8, // Morrowind
                'type' => 'main',
                'name' => 'The Citadels of the Sixth House',
                'description' => 'Find the Ash Vampires to collect powerful artifacts and make your assault on Dagoth Ur himself.',
            ],
            [
                'game_id' => 8, // Morrowind
                'type' => 'side',
                'name' => 'Fargoth\'s Ring',
                'description' => 'Return a missing ring and win favor with the owner and his friends.',
            ]
        ]);
    }
}
