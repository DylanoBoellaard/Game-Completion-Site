<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    // Specifies the correct table name for the model
    protected $table = 'user_quests';

    // Specifies the fillable properties for the model
    protected $fillable = [
        'user_id',
        'quest_id',
        'status',
        'progress_percentage',
        'completion_date',
        'notes',
    ];

    // UserQuest belongs to a quest
    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    // UserQuest belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
