<?php

namespace App\Services;

use App\Enums\ContactRole;
use App\Models\Contact;
use App\Models\Profile;

class ProfileContactService
{
    /**
     * Attach a contact to a profile.
     */
    public function attach(
        Profile $profile,
        Contact $contact,
        ContactRole $role = ContactRole::Self,
        bool $isPrimary = false,
    ): void {
        $profile->contacts()->syncWithoutDetaching([
            $contact->id => [
                'role' => $role,
                'is_primary' => $isPrimary,
            ],
        ]);
    }
}
