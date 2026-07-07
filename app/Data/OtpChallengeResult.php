<?php

namespace App\Data;

use App\Models\OtpChallenge;

readonly class OtpChallengeResult
{
    public function __construct(

        /**
         * Created OTP challenge.
         */
        public OtpChallenge $otpChallenge,
        public string $plainCode,

    ) {}
}
