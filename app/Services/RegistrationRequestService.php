<?php

namespace App\Services;

use App\Data\OtpChallengeData;
use App\Data\RegistrationRequestData;
use App\Data\RegistrationRequestResult;
use App\Enums\RegistrationRequestStatus;
use App\Models\RegistrationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrationRequestService
{
    public function __construct(
        private readonly OtpChallengeService $otpChallengeService,
    ) {}

    /**
     * Start a registration process.
     */
    public function create(
        RegistrationRequestData $data
    ): RegistrationRequestResult {

        return DB::transaction(function () use ($data) {

            $registrationRequest = $this->findOrCreatePendingRequest($data);

            $this->otpChallengeService->create(
                new OtpChallengeData(
                    registrationRequest: $registrationRequest,
                    ip: $data->ip,
                    userAgent: $data->userAgent,
                )
            );

            return new RegistrationRequestResult(
                registrationRequest: $registrationRequest,
            );

        });
    }

    /**
     * Find an existing pending registration request or create a new one.
     */
    private function findOrCreatePendingRequest(
        RegistrationRequestData $data
    ): RegistrationRequest {

        $registrationRequest = RegistrationRequest::query()
            ->where('identifier_type', $data->identifierType)
            ->where('identifier_number', $data->identifierNumber)
            ->where('status', RegistrationRequestStatus::Pending)
            ->first();

        if ($registrationRequest !== null) {
            return $registrationRequest;
        }

        return $this->createRegistrationRequest($data);
    }

    /**
     * Create a new registration request.
     */
    private function createRegistrationRequest(
        RegistrationRequestData $data
    ): RegistrationRequest {

        return RegistrationRequest::create([

            'public_id' => (string) Str::ulid(),

            'identifier_type' => $data->identifierType,

            'identifier_number' => $data->identifierNumber,

            'first_name' => $data->firstName,

            'last_name' => $data->lastName,

            'contact_type' => $data->contactType,

            'contact_value' => $data->contactValue,

            'status' => RegistrationRequestStatus::Pending,

            'ip' => $data->ip,

            'user_agent' => $data->userAgent,

        ]);
    }
}
