<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom', 'telephone', 'email', 'password',
    ];

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            $user->role ??= 'user';
            $user->status ??= 'actif';
        });
    }

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'otp_expires_at' => 'datetime',
            'telephone_verified_at' => 'datetime',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function moyensPaiement()
    {
        return $this->hasMany(MoyenPaiement::class);
    }

    public function prets()
    {
        return $this->hasMany(Pret::class);
    }

    public function abonnements()
    {
        return $this->hasMany(Abonnement::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
