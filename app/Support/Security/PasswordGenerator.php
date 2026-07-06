<?php

namespace App\Support\Security;

use Illuminate\Support\Str;

final class PasswordGenerator
{
    public function generate(int $length = 8): string
    {
        return Str::upper(Str::random($length));
    }
}