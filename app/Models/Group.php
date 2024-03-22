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

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'username',
        'bio',
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

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function chits(): MorphMany
    {
        return $this->morphMany(Chit::class, 'chitable');
    }
}
