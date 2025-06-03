<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Donation
 * Merepresentasikan data donasi (uang, barang, dukungan emosional)
 *
 * Relasi:
 * - campaign: Campaign yang didonasikan
 * - user: User yang melakukan donasi (bisa null/guest)
 * - emotionalSession: Sesi dukungan emosional (jika ada)
 */
class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'donor_name',
        'type',
        'amount',
        'item_description',
        'item_quantity',
        'initial_message', 
        'session_count',
        'payment_proof',
        'payment_verified',
    ];
    
    
    /**
     * Relasi ke campaign tujuan donasi
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Relasi ke user yang berdonasi (bisa null/guest)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke sesi dukungan emosional (jika ada)
     */
    public function emotionalSession()
    {
        return $this->hasOne(EmotionalSession::class);
    }
}

