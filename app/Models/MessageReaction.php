<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'chit_id',
        'user_id',
        'reaction'
    ];

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function chit(): BelongsTo
    {
        return $this->belongsTo(Chit::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
