<?php

namespace App\Services;

use App\Data\OtpChallengeData;
use App\Data\OtpChallengeResult;
use App\Models\OtpChallenge;
use Illuminate\Support\Facades\Hash;

class OtpChallengeService
{
    /**
     * Create a new OTP challenge.
     */
    public function create(
        OtpChallengeData $data
    ): OtpChallengeResult {

        $plainCode = $this->generateCode();

        $this->invalidatePreviousChallenges(
            $data->registrationRequest->id
        );

        $otpChallenge = OtpChallenge::create([

            'registration_request_id' => $data->registrationRequest->id,

            'code_hash' => Hash::make($plainCode),

            'attempts' => 0,
            'next_retry_at' => now()->addSeconds(config('otp.retry_after')),

            'expires_at' => now()->addMinutes(config('otp.expires_after')),

            'ip' => $data->ip,

            'user_agent' => $data->userAgent,

        ]);

        return new OtpChallengeResult(
            otpChallenge: $otpChallenge,
            plainCode: $plainCode,
        );
    }

    /**
     * Invalidate previous active OTP challenges.
     */
    private function invalidatePreviousChallenges(
        int $registrationRequestId
    ): void {
        OtpChallenge::query()
            ->where('registration_request_id', $registrationRequestId)
            ->whereNull('verified_at')
            ->whereNull('invalidated_at')
            ->update([
                'invalidated_at' => now(),
            ]);
    }

    /**
     * Generate a six digit OTP code.
     */
    private function generateCode(): string
    {
        return (string) random_int(100000, 999999);
    }
}
