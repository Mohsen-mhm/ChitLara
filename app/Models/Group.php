<?php

namespace App\Models;

use App\Enums\GroupTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Group extends Model
{
    use HasFactory;

    public const TYPE_PUBLIC = 'public';
    public const TYPE_PRIVATE = 'private';

    protected $fillable = [
        'uuid',
        'creator_id',
        'name',
        'username',
        'bio',
        'avatar',
        'type',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => GroupTypeEnum::class,
        ];
    }

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_users');
    }

    public function chits(): MorphMany
    {
        return $this->morphMany(Chit::class, 'chitable');
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
}
