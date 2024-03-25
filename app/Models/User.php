<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\AppLangEnum;
use App\Enums\AppThemeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'bio',
        'email',
        'phone',
        'avatar',
        'password',
        'uuid',
        '2fa',
        '2fa_code',
        'active',
        'theme',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        '2fa_code',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            '2fa_code' => 'hashed',
            '2fa' => 'boolean',
            'active' => 'boolean',
            'theme' => AppThemeEnum::class,
            'lang' => AppLangEnum::class,
        ];
    }

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function ownGroups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function chits(): MorphMany
    {
        return $this->morphMany(Chit::class, 'chitable');
    }

    /**
     * -------------------------------
     * ---------- Utility Methods ----------
     * -------------------------------
     */

    public static function getByEmail($email): object|null
    {
        return self::query()->where('email', $email)->first();
    }

    public static function getByUsername($username): object|null
    {
        return self::query()->where('username', $username)->first();
    }
}
