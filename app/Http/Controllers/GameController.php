<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\UserGame;

class GameController extends Controller
{
    // Show a dashboard of all games in a user's collection
    public function index()
    {
        // Get all games in the user's collection
        $userGames = UserGame::where('user_id', 1)->get(); // Replace with actual user ID from authentication

        // get all game details (category, platforms, quests, trackables)
        $gameDetails = $userGames->map(function ($userGame) {
            $game = $userGame->game; // Get the game details from the game model using the game_id from the user_games table

            return [
                'game' => $game,
                // Get the game's categories, platforms, quests, and trackables using the relationships defined in the Game model using the game_id from the user_games table
                'categories' => $game->category,
                'platforms' => $game->platform,
                'quests' => $game->quest,
                'trackables' => $game->trackable,
                'user_game' => $userGame
            ];
        });

        // dd($gameDetails);

        // return the game details to the view
        return view('games.index', compact('gameDetails'));
    }

    // Show details of a specific game
    /* Details to be displayed:
        - Game name
        - Description
        - Release date
        - Platforms it's available on
        - User's completion status (not started, in progress, completed)
        - User's playtime
        - User's notes

        - List of 5 the 5 most recent main quests  (include total main quest completion percentage and status for each quest)
        - List of 5 the 5 most recent side quests (include total side quest completion percentage and status for each quest)
        - List of the 5 most recent quests in total (main + side) (include total completion percentage and status for each quest)
        - List of 5 the 5 most recent achievements (include total achievement completion percentage and status for each achievement)
        - List of 5 the 5 most recent collectables (including total collectable completion percentage and status for each collectable)
        - List of 5 the 5 most recent secrets (including total secret completion percentage and status for each secret)
    */
    public function show(Request $request)
    {
        return view('games.show');
    }
}
