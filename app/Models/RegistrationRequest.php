<?php

namespace App\Models;

use App\Enums\ContactType;
use App\Enums\IdentifierType;
use App\Enums\RegistrationRequestStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RegistrationRequest extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [

            'identifier_type' => IdentifierType::class,

            'contact_type' => ContactType::class,

            'status' => RegistrationRequestStatus::class,

            'verified_at' => 'datetime',

            'expires_at' => 'datetime',

        ];
    }

    /**
     * Get the latest OTP challenge for this registration request.
     *
     * @return HasOne<OtpChallenge, $this>
     */
    public function latestOtpChallenge(): HasOne
    {
        return $this->hasOne(OtpChallenge::class)->latestOfMany();
    }
}
