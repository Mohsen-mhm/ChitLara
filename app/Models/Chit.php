<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Chit extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'chitable_type',
        'chitable_id',
        'message',
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
}
