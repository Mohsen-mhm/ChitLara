<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Casts\Json;
use App\Enums\AppLangEnum;
use App\Enums\AppThemeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'username',
        'bio',
        'email',
        'email_verified_at',
        'phone',
        'avatar',
        'password',
        '2fa_enabled',
        '2fa_secret',
        'active',
        'theme',
        'last_seen_at',
        'last_activity',
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
            'last_activity' => Json::class,
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
        return $this->hasMany(Group::class, 'creator_id');
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_users');
    }

    public function chits(): MorphMany
    {
        return $this->morphMany(Chit::class, 'chitable');
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(Verification::class);
    }

    public function saveMessage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SaveMessage::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * -------------------------------------
     * ---------- Utility Methods ----------
     * -------------------------------------
     */

    public static function getByUuid($uuid): object|null
    {
        return self::query()->where('uuid', $uuid)->first();
    }

    public static function getByEmail($email): object|null
    {
        return self::query()->where('email', $email)->first();
    }

    public static function getByUsername($username): object|null
    {
        return self::query()->where('username', $username)->first();
    }

    public function isEmailVerified(): bool
    {
        return !!$this->email_verified_at;
    }

    public function setEmailVerified(): bool
    {
        $this->email_verified_at = now();
        return $this->save();
    }

    public function changePassword($password): bool
    {
        $this->password = $password;
        return $this->save();
    }

    public function getUserTheme(): string
    {
        return $this->theme;
    }

    public function getUserLastSeen(): string
    {
        return Carbon::parse($this->last_seen_at)->diffForHumans();
    }
}
