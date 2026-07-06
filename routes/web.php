<?php


use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';

use App\Services\Sms\ParsGreenService;

Route::get('/otp-send', function (\App\Services\Auth\OtpService $otp) {

    $otp->send('09177755924');

    return 'sent';
});
