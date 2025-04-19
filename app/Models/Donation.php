<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'type',
        'amount',
        'item_description',
        'session_count',
        'donor_name',
        'payment_proof',
        'payment_verified',
    ];
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emotionalSession()
    {
        return $this->hasOne(EmotionalSession::class);
    }
}

