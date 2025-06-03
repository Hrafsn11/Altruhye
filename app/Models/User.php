<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * Model User
 * Merepresentasikan data user aplikasi (donatur/admin/pemilik campaign)
 *
 * Relasi:
 * - campaigns: Campaign yang dibuat user
 * - donations: Donasi yang dilakukan user
 * - identityVerifications: Data verifikasi identitas user
 */
class User extends Authenticatable implements FilamentUser // Implementasikan FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_photo_path',
        'is_admin', // Tambahkan is_admin ke fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean', // Cast is_admin sebagai boolean
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return URL::asset('storage/' . $this->profile_photo_path);
        }

        return $this->defaultProfilePhotoUrl();
    }

    /**
     * Relasi ke campaign yang dibuat user
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Relasi ke donasi yang dilakukan user
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Relasi ke data verifikasi identitas user
     */
    public function identityVerifications()
    {
        return $this->hasMany(\App\Models\IdentityVerification::class);
    }

    // Implementasi method canAccessPanel
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin; // Hanya user dengan is_admin true yang bisa akses
    }
}
