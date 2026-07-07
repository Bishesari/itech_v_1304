<?php

namespace App\Enums;

enum RegistrationRequestStatus: string
{
    /**
     * Registration request created.
     */
    case Pending = 'pending';

    /**
     * OTP has been sent to the user.
     */
    case OtpSent = 'otp_sent';

    /**
     * Contact information has been verified.
     */
    case Verified = 'verified';

    /**
     * Registration process completed successfully.
     */
    case Completed = 'completed';

    /**
     * Registration request has been cancelled.
     */
    case Cancelled = 'cancelled';

    /**
     * Registration request has expired.
     */
    case Expired = 'expired';
}
