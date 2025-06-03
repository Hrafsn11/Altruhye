<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Message
 * Menyimpan pesan dalam sesi dukungan emosional
 *
 * Relasi:
 * - emotionalSession: Sesi tempat pesan dikirim
 * - sender: User pengirim pesan
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = ['emotional_session_id', 'sender_id', 'message'];

    /**
     * Relasi ke sesi dukungan emosional
     */
    public function emotionalSession()
    {
        return $this->belongsTo(EmotionalSession::class);
    }

    /**
     * Relasi ke user pengirim pesan
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
