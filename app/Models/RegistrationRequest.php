<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RegistrationRequest extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [

            'verified_at' => 'datetime',

            'expires_at' => 'datetime',

        ];
    }

    /**
     * @return HasMany<OtpChallenge, $this>
     */
    public function latestOtpChallenge(): HasOne
    {
        return $this->hasOne(OtpChallenge::class)->latestOfMany();
    }
}
