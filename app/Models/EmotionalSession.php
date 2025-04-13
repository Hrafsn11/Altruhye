<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmotionalSession extends Model
{
    use HasFactory;

    protected $fillable = ['donation_id', 'campaign_id', 'user_id'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
