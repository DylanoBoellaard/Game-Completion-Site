<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category can belong to many games
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_categories');
    }
}
