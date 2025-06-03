<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model IdentityVerification
 * Menyimpan data verifikasi identitas user
 *
 * Relasi:
 * - user: User yang mengajukan verifikasi
 */
class IdentityVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone_number',
        'bank_account_number',
        'ktp_number',
        'photo',
        'status',
    ];

    /**
     * Relasi ke user yang mengajukan verifikasi
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
