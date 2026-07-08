<?php

namespace App\Data;

use App\Models\RegistrationRequest;

readonly class RegistrationRequestResult
{
    public function __construct(

        /**
         * Created or reused registration request.
         */
        public RegistrationRequest $registrationRequest,

        /**
         * Newly created OTP challenge.
         */
        public OtpChallengeResult $otpChallenge,

    ) {}
}
