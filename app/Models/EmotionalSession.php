<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model EmotionalSession
 * Menyimpan data sesi dukungan emosional (curhat)
 *
 * Relasi:
 * - donation: Donasi yang memicu sesi
 * - campaign: Campaign terkait
 * - user: User yang terlibat
 * - messages: Pesan dalam sesi
 */
class EmotionalSession extends Model
{
    use HasFactory;

    protected $fillable = ['donation_id', 'campaign_id', 'user_id'];

    /**
     * Relasi ke donasi pemicu sesi
     */
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    /**
     * Relasi ke campaign terkait
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Relasi ke user yang terlibat
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke pesan dalam sesi
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
