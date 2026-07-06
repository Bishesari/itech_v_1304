<?php

namespace App\Services;
use App\Data\RegisterData;
use App\Models\Profile;

class ProfileService
{
    public function create(RegisterData $data): Profile
    {
        return Profile::query()->create([
            'identifier_type'   => $data->identifierType,
            'identifier_number' => $data->identifierNumber,

            'first_name_fa'     => $data->firstNameFa,
            'last_name_fa'      => $data->lastNameFa,

            'gender'            => $data->gender,
        ]);
    }
}