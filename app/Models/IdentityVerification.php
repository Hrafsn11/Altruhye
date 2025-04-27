<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
