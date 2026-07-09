<?php

namespace App\Services;

use App\Data\OtpVerificationData;
use App\Data\OtpVerificationResult;
use App\Models\OtpChallenge;
use App\Models\RegistrationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RuntimeException;
use App\Enums\RegistrationRequestStatus;

class OtpVerificationService
{
    /**
     * Verify an OTP challenge.
     */
    public function verify(
        OtpVerificationData $data
    ): OtpVerificationResult {

        return DB::transaction(function () use ($data) {

            $challenge = $this->getCurrentChallenge(
                $data->registrationRequest,
            );

            $this->validateChallenge($challenge);

            $this->verifyCode(
                $challenge,
                $data->code,
            );

            $this->markAsVerified(
                $data->registrationRequest,
                $challenge,
            );

            return new OtpVerificationResult(
                registrationRequest: $data->registrationRequest,
                otpChallenge: $challenge,
            );
        });
    }

    /**
     * Get the current OTP challenge.
     */
    private function getCurrentChallenge(
        RegistrationRequest $registrationRequest,
    ): OtpChallenge {

        $challenge = $registrationRequest->currentOtpChallenge;

        if ($challenge === null) {
            throw new RuntimeException('No active OTP challenge found.');
        }

        return $challenge;
    }

    /**
     * Validate challenge state.
     */
    private function validateChallenge(
        OtpChallenge $challenge,
    ): void {

        if ($challenge->isVerified()) {
            throw new RuntimeException('OTP has already been verified.');
        }

        if ($challenge->isInvalidated()) {
            throw new RuntimeException('OTP has been invalidated.');
        }

        if ($challenge->isExpired()) {
            throw new RuntimeException('OTP has expired.');
        }
    }

    /**
     * Verify the entered OTP code.
     */
    private function verifyCode(
        OtpChallenge $challenge,
        string $code,
    ): void {

        if (! Hash::check($code, $challenge->code_hash)) {
            throw new RuntimeException('Invalid OTP code.');
        }
    }

    /**
     * Mark challenge and registration request as verified.
     */
    private function markAsVerified(
        RegistrationRequest $registrationRequest,
        OtpChallenge $challenge,
    ): void {

        $now = now();

        $challenge->update([
            'verified_at' => $now,
        ]);

        $registrationRequest->update([
            'verified_at' => $now,
            'status' => RegistrationRequestStatus::Verified,
        ]);
    }
}
