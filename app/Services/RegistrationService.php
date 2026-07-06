<?php

namespace App\Services;

use App\Data\RegisterData;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    public function register(RegisterData $data): void
    {
        DB::transaction(function () use ($data) {

            // Contact

            // Profile

            // Generate Password

            // User

            // Attach Contact To Profile

            // Assign Default Role

        });
    }
}
