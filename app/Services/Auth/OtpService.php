<?php

namespace App\Services\Auth;

use App\Services\Sms\ParsGreenService;
use Illuminate\Support\Facades\Cache;

class OtpService
{
    public function __construct(
        protected ParsGreenService $sms
    ) {}

    /**
     * تولید کد OTP
     */
    public function generateCode(): string
    {
        return (string) random_int(100000, 999999);
    }

    /**
     * ارسال OTP
     */
    public function send(string $mobile): bool
    {
        // جلوگیری از اسپم (60 ثانیه)
        if ($this->isBlocked($mobile)) {
            return false;
        }

        $code = $this->generateCode();

        // ذخیره OTP (5 دقیقه)
        Cache::put($this->otpKey($mobile), $code, now()->addMinutes(5));

        // لاک ارسال مجدد
        Cache::put($this->blockKey($mobile), true, now()->addSeconds(60));

        // ارسال SMS
        $this->sms->sendMessage(
            $mobile,
            "کد تایید شما: {$code}"
        );

        return true;
    }

    /**
     * بررسی OTP
     */
    public function verify(string $mobile, string $code): bool
    {
        $stored = Cache::get($this->otpKey($mobile));

        if (!$stored) {
            return false;
        }

        if ($stored !== $code) {
            return false;
        }

        // بعد از موفقیت، OTP حذف شود
        Cache::forget($this->otpKey($mobile));

        return true;
    }

    /**
     * جلوگیری از ارسال پشت سر هم
     */
    private function isBlocked(string $mobile): bool
    {
        return Cache::has($this->blockKey($mobile));
    }

    private function otpKey(string $mobile): string
    {
        return "otp:{$mobile}";
    }

    private function blockKey(string $mobile): string
    {
        return "otp:block:{$mobile}";
    }
}
