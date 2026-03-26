<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    // Quest belongs to a game
    public function games()
    {
        return $this->belongsTo(Game::class);
    }

    // Quest can have many trackables
    public function trackables()
    {
        return $this->hasMany(Trackable::class);
    }

    // Quest can belong to many users through user_quests pivot table
    public function userQuests()
    {
        return $this->hasMany(UserQuest::class);
    }

    // Quest can belong to many users through user_quests pivot table with additional pivot data
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quests')
                    ->withPivot('status', 'progress_percentage', 'completion_date', 'notes')
                    ->withTimestamps();
    }
}
