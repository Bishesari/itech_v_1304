<?php

namespace App\Data;

use App\Models\OtpChallenge;
use App\Models\RegistrationRequest;

readonly class OtpVerificationResult
{
    public function __construct(

        /**
         * Verified registration request.
         */
        public RegistrationRequest $registrationRequest,

        /**
         * Verified OTP challenge.
         */
        public OtpChallenge $otpChallenge,

    ) {}
}
