<?php

declare(strict_types=1);

namespace App\Infrastructure\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /** {@inheritDoc} */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** {@inheritDoc} */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** {@inheritDoc} */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
