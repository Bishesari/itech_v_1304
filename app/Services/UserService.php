<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\User;

class UserService
{
    public function create(
        Profile $profile,
        string $username,
        string $password,
    ): User {

        return User::query()->create([
            'profile_id' => $profile->id,
            'username'   => $username,
            'password'   => $password,
        ]);
    }
}