<?php

namespace App\Services;

use App\Enums\ContactType;
use App\Models\Contact;
use App\Support\Normalizers\MobileNormalizer;

class ContactService
{
    public function findByTypeAndValue(
    ContactType $type,
    string $value,
): ?Contact {

    if ($type === ContactType::MOBILE) {
        $value = MobileNormalizer::normalize($value);
    }

    return Contact::query()
        ->where('type', $type)
        ->where('value', $value)
        ->first();
}

    public function create(
    ContactType $type,
    string $value,
): Contact {

    if ($type === ContactType::MOBILE) {
        $value = MobileNormalizer::normalize($value);
    }

    return Contact::query()->create([
        'type' => $type,
        'value' => $value,
    ]);
}

    public function findOrCreate(
        ContactType $type,
        string $value,
    ): Contact {
        return $this->findByTypeAndValue($type, $value)
            ?? $this->create($type, $value);
    }
}
