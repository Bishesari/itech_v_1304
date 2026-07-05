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
}
