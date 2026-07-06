<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';



use App\Data\RegisterData;
use App\Enums\Gender;
use App\Enums\IdentifierType;
use App\Services\ProfileService;
use App\Services\UserService;

Route::get('/test-dto', function (
    ProfileService $profileService,
    UserService $userService,
) {

    $dto = RegisterData::fromArray([
        'identifier_type'   => IdentifierType::NationalId->value,
        'identifier_number' => '1234567890',

        'first_name_fa' => 'یاسر',
        'last_name_fa'  => 'بیشه‌سری',

        'mobile' => '09121234567',

        'gender' => Gender::Male->value,
    ]);

    $profile = $profileService->create($dto);

    $user = $userService->create(
        profile: $profile,
        username: $dto->identifierNumber,
        password: '12345678',
    );


    dd($user);
});
