<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Chit extends Model
{
    use HasFactory, SoftDeletes;

    public const TYPE_SAVED = 'saved';
    public const TYPE_GROUP = 'group';
    public const TYPE_USER = 'user';

    protected $fillable = [
        'uuid',
        'user_id',
        'chitable_type',
        'chitable_id',
        'message',
        'edited',
        'edited_at',
    ];

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function chitable(): MorphTo
    {
        return $this->morphTo('chitable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function attachment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MessageAttachment::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(MessageReaction::class);
    }

    public function getMessageSendAt(): string
    {
        return Carbon::parse($this->created_at)->format('H:i');
    }
}
