<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtpChallenge extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [

            'verified_at' => 'datetime',

            'invalidated_at' => 'datetime',

            'expires_at' => 'datetime',

            'next_retry_at' => 'datetime',

        ];
    }
    /**
     * @return BelongsTo<RegistrationRequest, $this>
     */
    public function registrationRequest(): BelongsTo
    {
        return $this->belongsTo(RegistrationRequest::class);
    }
    public function isVerified(): bool
    {
        return $this->verified_at !== null;
    }

    public function isInvalidated(): bool
    {
        return $this->invalidated_at !== null;
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function canRetry(): bool
    {
        return $this->next_retry_at->isPast();
    }
}
