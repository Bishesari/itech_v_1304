<?php

namespace App\Data;

use App\Enums\Gender;
use App\Enums\IdentifierType;

final readonly class RegisterData
{
    public function __construct(
        public IdentifierType $identifierType,
        public string $identifierNumber,

        public string $firstNameFa,
        public string $lastNameFa,

        public string $mobile,

        public ?Gender $gender = null,
    ) {
    }

   public static function fromArray(array $data): self
{
    return new self(
        identifierType: IdentifierType::from($data['identifier_type']),
        identifierNumber: $data['identifier_number'],

        firstNameFa: $data['first_name_fa'],
        lastNameFa: $data['last_name_fa'],

        mobile: $data['mobile'],

        gender: isset($data['gender'])
            ? Gender::from($data['gender'])
            : null,
    );
}
}