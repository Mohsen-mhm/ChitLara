<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class Verification extends Model
{
    use HasFactory;

    public const EMAIL_VERIFY = 'verify-email';
    public const FORGOT_PASSWORD = 'forgot-password';

    public const EXPIRE_TIME = 10; // in minutes

    protected $fillable = [
        'type',
        'user_id',
        'ip_address',
        'code',
        'expired_at',
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

    /**
     * -------------------------------------
     * ---------- Utility Methods ----------
     * -------------------------------------
     */

    public static function makeVerification(User $user, FormRequest $request, string $type): Model|Builder|null
    {
        $code = Str::random() . Str::uuid() . Str::random();

        try {
            return self::query()->create([
                'type' => $type,
                'user_id' => $user->id,
                'ip_address' => $request->ip(),
                'code' => $code,
                'expired_at' => now()->addMinutes(self::EXPIRE_TIME)
            ]);
        } catch (Exception) {
            return null;
        }
    }
}
