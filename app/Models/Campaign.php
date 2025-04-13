<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'type', 
        'target_amount', 'target_items', 'target_sessions', 
        'collected_amount', 'collected_items', 'collected_sessions', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function emotionalSessions()
    {
        return $this->hasMany(EmotionalSession::class);
    }
}
