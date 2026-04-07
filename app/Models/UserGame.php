<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGame extends Model
{
    // Specifies the correct table name for the model
    protected $table = 'user_games';

    // Specifies the fillable properties for the model
    protected $fillable = [
        'user_id',
        'game_id',
        'status',
        'completion_date',
        'playtime',
        'notes',
    ];

    // UserGame belongs to a game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    // UserGame belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
