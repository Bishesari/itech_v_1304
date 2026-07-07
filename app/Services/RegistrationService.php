<?php

namespace App\Services;

use App\Data\RegisterData;
use App\Data\RegistrationResult;
use App\Enums\ContactRole;
use App\Enums\ContactType;
use App\Events\UserRegistered;
use App\Support\Security\PasswordGenerator;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    public function __construct(
        private readonly ContactService $contactService,
        private readonly ProfileService $profileService,
        private readonly UserService $userService,
        private readonly ProfileContactService $profileContactService,
        private readonly PasswordGenerator $passwordGenerator,
    ) {}

    public function register(RegisterData $data): RegistrationResult
    {
        $result = DB::transaction(function () use ($data) {

            $contact = $this->contactService->findOrCreate(
                ContactType::MOBILE,
                $data->mobile,
            );

            $profile = $this->profileService->create($data);

            $password = $this->passwordGenerator->generate();

            $user = $this->userService->create(
                profile: $profile,
                username: $data->identifierNumber,
                password: $password,
            );

            $this->profileContactService->attach(
                profile: $profile,
                contact: $contact,
                role: ContactRole::Self,
                isPrimary: true,
            );

            return new RegistrationResult(
                user: $user,
                profile: $profile,
                contact: $contact,
                generatedPassword: $password,
            );
        });

        DB::afterCommit(function () use ($result) {
            UserRegistered::dispatch($result);
        });

        return $result;
    }
}
