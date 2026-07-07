<?php

namespace App\Data;

use App\Models\RegistrationRequest;

readonly class RegistrationRequestResult
{
    public function __construct(

        /**
         * Created registration request.
         */
        public RegistrationRequest $registrationRequest,

    ) {}
}
