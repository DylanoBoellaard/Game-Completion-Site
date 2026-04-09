<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrackable extends Model
{
    // Specifies the correct table name for the model
    protected $table = 'user_trackables';

    // Specifies the fillable properties for the model
    protected $fillable = [
        'user_id',
        'trackable_id',
        'status',
        'progress_percentage',
        'completion_date',
        'notes',
    ];

    // UserTrackable belongs to a trackable
    public function trackable()
    {
        return $this->belongsTo(Trackable::class);
    }

    // UserQuest belongs to a quest
    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }

    // UserTrackable belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
