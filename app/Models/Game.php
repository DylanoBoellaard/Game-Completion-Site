<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Game can have many categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'game_categories');
    }

    // Game can belong to many platforms
    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platforms');
    }

    // Game can have many quests
    public function quests()
    {
        return $this->hasMany(Quest::class);
    }

    // Game can have many trackables
    public function trackables()
    {
        return $this->hasMany(Trackable::class);
    }

    // Game can belong to many users through user_games pivot table
    public function userGames()
    {
        return $this->hasMany(UserGame::class);
    }

    // Game can belong to many users through user_games pivot table with additional pivot data
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_games')
                    ->withPivot('status', 'completion_date', 'playtime', 'notes')
                    ->withTimestamps();
    }
}
