<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trackable extends Model
{
    // Trackable belongs to a game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    // Trackable belongs to a quest
    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    // Trackable can belong to many users through user_trackables pivot table
    public function userTrackable()
    {
        return $this->hasMany(UserTrackable::class);
    }

    // Trackable can belong to many users through user_trackables pivot table with additional pivot data
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_trackables')
                    ->withPivot('status', 'progress_percentage', 'completion_date', 'notes')
                    ->withTimestamps();
    }
}
