<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaveMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
    ];

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
