<?php

namespace App\Data;

use App\Models\User;
use App\Models\Profile;
use App\Models\Contact;

final readonly class RegistrationResult
{
    public function __construct(
        public User $user,
        public Profile $profile,
        public Contact $contact,
        public string $generatedPassword,
    ) {
    }
}
