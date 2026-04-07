<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // User can have many games
    public function game()
    {
        return $this->belongsToMany(Game::class, 'user_games')
                    ->withPivot('status', 'completion_date', 'playtime', 'notes')
                    ->withTimestamps();
    }

    // User can have many quests
    public function quest()
    {
        return $this->belongsToMany(Quest::class, 'user_quests')
                    ->withPivot('status', 'progress_percentage', 'completion_date', 'notes')
                    ->withTimestamps();
    }

    // User can have many trackables
    public function trackable()
    {
        return $this->belongsToMany(Trackable::class, 'user_trackables')
                    ->withPivot('status', 'progress_percentage', 'completion_date', 'notes')
                    ->withTimestamps();
    }

    // User can have many user_games, user_quests, and user_trackables for additional pivot data access
    public function userGame()
    {
        return $this->hasMany(UserGame::class);
    }

    public function userQuest()
    {
        return $this->hasMany(UserQuest::class);
    }

    public function userTrackable()
    {
        return $this->hasMany(UserTrackable::class);
    }
}
