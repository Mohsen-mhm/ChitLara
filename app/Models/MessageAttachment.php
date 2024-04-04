<?php

namespace App\Models;

use App\Enums\AttachmentTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageAttachment extends Model
{
    use HasFactory;

    public const TYPE_IMAGE = 'image';
    public const TYPE_FILE = 'file';

    protected $fillable = [
        'chit_id',
        'type',
        'path',
        'name'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => AttachmentTypeEnum::class,
        ];
    }

    /**
     * -------------------------------
     * ---------- Relations ----------
     * -------------------------------
     */

    public function chit(): BelongsTo
    {
        return $this->belongsTo(Chit::class);
    }

    public function getType()
    {
        return $this->type->value;
    }
}
