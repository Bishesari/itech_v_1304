<?php

namespace App\Data;

use App\Models\RegistrationRequest;

readonly class OtpVerificationData
{
    public function __construct(

        /**
         * Registration request being verified.
         */
        public RegistrationRequest $registrationRequest,

        /**
         * OTP entered by the user.
         */
        public string $code,

        /**
         * Client IP address.
         */
        public string $ip,

        /**
         * Client user agent.
         */
        public ?string $userAgent,

    ) {}
}
