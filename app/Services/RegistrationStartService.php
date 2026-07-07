<?php

namespace App\Services;

use App\Data\RegisterData;
use App\Data\RegistrationStartResult;
use Illuminate\Support\Facades\DB;

class RegistrationStartService
{
    public function __construct(
        private readonly RegistrationAttemptService $attemptService,
        private readonly OtpService $otpService,
        private readonly SmsService $smsService,
    ) {
    }

    public function start(RegisterData $data): RegistrationStartResult
    {
        return DB::transaction(function () use ($data) {

            // 1- بررسی شرایط ثبت نام

            // 2- ایجاد RegistrationAttempt

            // 3- تولید OTP

            // 4- ذخیره OTP

            // 5- ارسال پیامک

            // 6- برگرداندن نتیجه
        });
    }
}
