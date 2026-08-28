<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class MagicLink extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'email',
        'expires_at',
        'used_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at'    => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cria um magic link válido por 15 minutos.
     */
    public static function generateFor(User $user): self
    {
        // Limpar tokens antigos deste usuário
        static::where('user_id', $user->id)
            ->whereNull('used_at')
            ->where('expires_at', '>', now())
            ->update(['used_at' => now()]);

        return static::create([
            'user_id'    => $user->id,
            'token'      => Str::random(64),
            'email'      => $user->email,
            'expires_at' => now()->addMinutes(15),
        ]);
    }

    /**
     * Verifica se o token é válido.
     */
    public function isValid(): bool
    {
        return !$this->used_at && $this->expires_at->isFuture();
    }

    /**
     * Marca como utilizado.
     */
    public function markAsUsed(): void
    {
        $this->update(['used_at' => now()]);
    }

    /**
     * Remove tokens expirados (pode ser chamado por um scheduled task).
     */
    public static function cleanExpired(): int
    {
        return static::where('expires_at', '<', now())->delete();
    }
}
