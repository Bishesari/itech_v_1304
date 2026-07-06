<?php

namespace App\Events;

use App\Data\RegistrationResult;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public RegistrationResult $result,
    ) {
    }
}
