<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Model Campaign
 * Merepresentasikan data galang dana/barang/dukungan
 *
 * Relasi:
 * - user: User yang membuat campaign
 * - donations: Donasi yang masuk ke campaign
 * - emotionalSessions: Sesi dukungan emosional (jika ada)
 */
class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug', 
        'description',
        'type',
        'target_amount',
        'target_items',
        'target_sessions',
        'collected_amount',
        'collected_items',
        'collected_sessions',
        'status',
        'gambar' 
    ];

    /**
     * Relasi ke user pembuat campaign
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke donasi yang masuk ke campaign
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Relasi ke sesi dukungan emosional (jika ada)
     */
    public function emotionalSessions()
    {
        return $this->hasMany(EmotionalSession::class);
    }
    public function progressPercent(): float
    {
        switch ($this->type) {
            case 'financial':
                return $this->target_amount
                    ? min(($this->collected_amount / $this->target_amount) * 100, 100)
                    : 0;

            case 'goods':
                return $this->target_items
                    ? min(($this->collected_items / $this->target_items) * 100, 100)
                    : 0;

            case 'emotional':
                return $this->target_sessions
                    ? min(($this->collected_sessions / $this->target_sessions) * 100, 100)
                    : 0;

            default:
                return 0;
        }
    }
    public function displayTarget(): string
    {
        return match ($this->type) {
            'financial' => 'Rp ' . number_format($this->target_amount, 0, ',', '.'),
            'goods' => $this->target_items . ' barang',
            'emotional' => $this->target_sessions . ' sesi',
            default => '-',
        };
    }
    public function displayCollected(): string
    {
        return match ($this->type) {
            'financial' => 'Rp ' . number_format($this->collected_amount, 0, ',', '.'),
            'goods' => $this->collected_items . ' barang',
            'emotional' => $this->collected_sessions . ' sesi dukungan',
            default => '-',
        };
    }
    protected static function booted()
{
    static::creating(function ($campaign) {
        if (empty($campaign->slug)) {
            $campaign->slug = Str::slug($campaign->title);
        }
    });
}

    
}
