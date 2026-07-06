<?php

namespace App\Support\Normalizers;

use InvalidArgumentException;

final class MobileNormalizer
{
    public static function normalize(string $mobile): string
    {
        // حذف هر چیزی به جز عدد
        $mobile = preg_replace('/\D+/', '', $mobile);

        if ($mobile === null) {
            throw new InvalidArgumentException('Invalid mobile number.');
        }

        // +989177755924 → 989177755924
        if (str_starts_with($mobile, '98')) {
            $mobile = substr($mobile, 2);
        }

        // 9177755924 → 09177755924
        if (strlen($mobile) === 10) {
            $mobile = '0' . $mobile;
        }

        // اعتبارسنجی نهایی
        if (! preg_match('/^09\d{9}$/', $mobile)) {
            throw new InvalidArgumentException('Invalid mobile number.');
        }

        return $mobile;
    }
}