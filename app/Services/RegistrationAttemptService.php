<?php

namespace App\Services;

use App\Data\RegisterData;
use App\Models\RegistrationAttempt;

class RegistrationAttemptService
{
    public function create(RegisterData $data): RegistrationAttempt
    {
        return RegistrationAttempt::create([
            'identifier_type'   => $data->identifierType,
            'identifier_number' => $data->identifierNumber,

            'first_name_fa' => $data->firstNameFa,
            'last_name_fa'  => $data->lastNameFa,

            'mobile' => $data->mobile,
        ]);
    }
}
