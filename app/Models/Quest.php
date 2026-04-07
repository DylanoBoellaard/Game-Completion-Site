<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    // Quest belongs to a game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    // Quest can have many trackables
    public function trackable()
    {
        return $this->hasMany(Trackable::class);
    }

    // Quest can belong to many users through user_quests pivot table
    public function userQuest()
    {
        return $this->hasMany(UserQuest::class);
    }

    // Quest can belong to many users through user_quests pivot table with additional pivot data
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_quests')
                    ->withPivot('status', 'progress_percentage', 'completion_date', 'notes')
                    ->withTimestamps();
    }
}
