<?php

namespace App\Data;

use App\Models\RegistrationRequest;

readonly class OtpChallengeData
{
    public function __construct(

        /**
         * Registration request that requires OTP verification.
         */
        public RegistrationRequest $registrationRequest,

        /**
         * Request security information.
         */
        public string $ip,

        public ?string $userAgent,

    ) {}
}
