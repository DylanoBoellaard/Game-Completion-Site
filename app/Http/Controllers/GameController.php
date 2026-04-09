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
            - Game name - DONE
        - Description - TO DO
        - Release date - TO DO
        - Platforms it's available on - TO DO
            - User's completion status (not started, in progress, completed) - DONE
            - User's playtime - DONE
            - User's notes - DONE

        - ALL DONE:
            - List of 5 the 5 most recent main quests  (include total main quest completion percentage and status for each quest)
            - List of 5 the 5 most recent side quests (include total side quest completion percentage and status for each quest)
            - List of the 5 most recent quests in total (main + side) (include total completion percentage and status for each quest)
            - List of 5 the 5 most recent achievements (include total achievement completion percentage and status for each achievement)
            - List of 5 the 5 most recent collectables (including total collectable completion percentage and status for each collectable)
            - List of 5 the 5 most recent secrets (including total secret completion percentage and status for each secret)
    */
    public function gameDetails(UserGame $userGame)
    {
        // Get the user_id from the user_games table
        $userId = $userGame->user_id;

        // Load the game details from the game model using the game_id from the user_games table
        $game = $userGame->load([
            'game.platform',
            'game.category',
            'game.quest',
            'game.trackable'
        ])->game;

        // User data for quests and trackables related to the game
        $userQuests = $userGame->user
            ->userQuest()
            ->with('quest')
            ->whereIn('quest_id', $game->quest->pluck('id'))
            ->latest()
            ->get();

        $userTrackables = $userGame->user
            ->userTrackable()
            ->with('trackable')
            ->whereIn('trackable_id', $game->trackable->pluck('id'))
            ->latest()
            ->get();

        // Split quests into main and side quests
        $mainQuests = $userGame->user
            ->userQuest()
            ->whereIn('quest_id', $game->quest->pluck('id'))
            ->whereHas('quest', fn($q) => $q->where('type', 'main'))
            ->with('quest')
            ->latest()
            ->take(5)
            ->get();

        $sideQuests = $userGame->user
            ->userQuest()
            ->whereIn('quest_id', $game->quest->pluck('id'))
            ->whereHas('quest', fn($q) => $q->where('type', 'side'))
            ->with('quest')
            ->latest()
            ->take(5)
            ->get();

        // All quests combined (main + side)
        $allQuests = $userQuests->sortByDesc('created_at')->take(5);

        // Split trackables into achievements, collectables, and secrets
        // TO DO: Apply quest type filter method (SQL filtering) to achievements, collectables, and secrets for better performance
        $achievements = $userTrackables
            ->filter(fn($ut) => $ut->trackable && $ut->trackable->type === 'achievement')
            ->take(5);

        $collectables = $userTrackables
            ->filter(fn($ut) => $ut->trackable && $ut->trackable->type === 'collectable')
            ->take(5);

        $secrets = $userTrackables
            ->filter(fn($ut) => $ut->trackable && $ut->trackable->type === 'secret')
            ->take(5);

        // Progress (bar) calculations
        // Quests
        $mainQuestProgress = round($mainQuests->avg('progress_percentage') ?? 0);
        $sideQuestProgress = round($sideQuests->avg('progress_percentage') ?? 0);
        $allQuestsProgress = round($userQuests->avg('progress_percentage') ?? 0);

        // Trackables
        $achievementProgress = round($achievements->avg('progress_percentage') ?? 0);
        $collectableProgress = round($collectables->avg('progress_percentage') ?? 0);
        $secretProgress = round($secrets->avg('progress_percentage') ?? 0);
        $allTrackablesProgress = round($userTrackables->avg('progress_percentage') ?? 0);

        // Total game progress
        $totalGameProgress = round($mainQuestProgress + $sideQuestProgress + $achievementProgress + $collectableProgress + $secretProgress) / 5 ?? 0;

        // dd($userTrackables);

        return view('games.details', compact(
            'game',
            'userGame',
            'mainQuests',
            'sideQuests',
            'allQuests',
            'achievements',
            'collectables',
            'secrets',
            'mainQuestProgress',
            'sideQuestProgress',
            'allQuestsProgress',
            'achievementProgress',
            'collectableProgress',
            'secretProgress',
            'allTrackablesProgress',
            'totalGameProgress'
        ));
    }
}
