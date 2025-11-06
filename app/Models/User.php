<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// اضافه کن:
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;

class User extends Authenticatable implements Wallet
{
    use HasApiTokens, HasFactory, Notifiable, HasWallet; // اینجا تریت اضافه شد

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'token',
        'token_expires_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(profile::class, 'id', 'karbar_id');
    }

    public function role()
    {
        return $this->belongsToMany(roles::class, 'role_user');
    }
}
