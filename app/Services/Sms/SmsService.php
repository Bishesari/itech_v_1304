<?php

namespace App\Services\Sms;

class SmsService
{
    public function __construct(
        private readonly ParsGreenService $parsGreenService,
    ) {}

    /**
     * Send OTP SMS.
     */
    public function sendOtp(
        string $mobile,
        string $code,
    ): bool {

        $result = $this->parsGreenService->sendOtp(
            mobile: $mobile,
            code: $code,
        );

        return $result['success'];
    }

    /**
     * Send a plain text SMS.
     */
    public function sendMessage(
        string|array $mobiles,
        string $text,
    ): bool {

        $result = $this->parsGreenService->sendMessage(
            mobiles: $mobiles,
            text: $text,
        );

        return $result['success'];
    }
}
