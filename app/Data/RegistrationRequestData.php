<?php

namespace App\Data;

use App\Enums\ContactType;
use App\Enums\IdentifierType;

readonly class RegistrationRequestData
{
    public function __construct(

        /**
         * Identity
         */
        public IdentifierType $identifierType,

        public string $identifierNumber,

        /**
         * Personal information
         */
        public string $firstName,

        public string $lastName,

        /**
         * Contact
         */
        public ContactType $contactType,

        public string $contactValue,

        /**
         * Security
         */
        public string $ip,

        public ?string $userAgent,

    ) {}

    /**
     * Create a RegistrationRequestData instance from validated form data.
     */
    public static function fromValidated(
        array $data,
        IdentifierType $identifierType,
        ContactType $contactType,
        string $ip,
        ?string $userAgent,
    ): self {
        return new self(
            identifierType: $identifierType,
            identifierNumber: $data['n_code'],
            firstName: $data['first_name_fa'],
            lastName: $data['last_name_fa'],
            contactType: $contactType,
            contactValue: $data['mobile'],
            ip: $ip,
            userAgent: $userAgent,
        );
    }
}
