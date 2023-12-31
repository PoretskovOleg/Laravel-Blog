<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $avatar
 * @property string $avatar_path
 * @property UserRole $role
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function avatarPath(): Attribute
    {
        return Attribute::get(
            fn(mixed $value, array $attributes) => !empty($attributes['avatar'])
                ? '/storage/'.$attributes['avatar']
                : "https://ui-avatars.com/api/?name={$attributes['name']}&color=7F9CF5&background=EBF4FF"
        );
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class);
    }
}
