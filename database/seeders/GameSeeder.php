<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TO DO: Check if description and release dates are correct
        DB::table('games')->insert([
            [
                'name' => 'The Legend of Zelda: Breath of the Wild',
                'description' => 'An open-world action-adventure game where players explore the vast kingdom of Hyrule, solve puzzles, and battle enemies to save Princess Zelda.',
                'release_date' => '2017-03-03',
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'description' => 'An open-world RPG where players control Geralt of Rivia, a monster hunter, as he searches for his adopted daughter in a war-torn world filled with magic and danger.',
                'release_date' => '2015-05-19',
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'description' => 'An action-adventure game set in the American Wild West, where players follow the story of Arthur Morgan, an outlaw and member of the Van der Linde gang.',
                'release_date' => '2018-10-26',
            ],
            [
                'name' => 'God of War (2018)',
                'description' => 'An action-adventure game that follows Kratos and his son Atreus as they journey through the world of Norse mythology, battling gods and monsters.',
                'release_date' => '2018-04-20',
            ],
            [
                'name' => 'Hollow Knight',
                'description' => 'A 2D action-adventure game set in a dark, underground world filled with insects and heroes. Players explore, fight, and uncover the secrets of Hallownest.',
                'release_date' => '2017-02-24',
            ],
            [
                'name' => 'The Elder Scrolls V: Skyrim',
                'description' => 'A role-playing game set in the world of Skyrim, where players explore the vast, open world, solve puzzles, and battle monsters to save the world from evil.',
                'release_date' => '2011-11-17',
            ],
            [
                'name' => 'The Elder Scrolls IV: Oblivion',
                'description' => 'A role-playing game set in the world of Oblivion, where players explore the vast, open world, solve puzzles, and battle monsters to save the world from evil.',
                'release_date' => '2009-11-17',
            ],
            [
                'name' => 'The Elder Scrolls III: Morrowind',
                'description' => 'A role-playing game set in the world of Morrowind, where players explore the vast, open world, solve puzzles, and battle monsters to save the world from evil.',
                'release_date' => '2002-11-17',
            ],
            [
                'name' => 'The Elder Scrolls II: Daggerfall',
                'description' => 'A role-playing game set in the world of Daggerfall, where players explore the vast, open world, solve puzzles, and battle monsters to save the world from evil.',
                'release_date' => '1996-11-17',
            ],
            [
                'name' => 'The Elder Scrolls: Arena',
                'description' => 'A role-playing game set in the world of Arena, where players explore the vast, open world, solve puzzles, and battle monsters to save the world from evil.',
                'release_date' => '1994-11-17',
            ]
        ]);
    }
}
