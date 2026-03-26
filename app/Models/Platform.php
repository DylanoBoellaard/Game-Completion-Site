<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    // Platform can belong to many games
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_platforms');
    }
}
