<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeSms implements ShouldQueue
{
    use InteractsWithQueue;

    public int $tries = 3;

    public int $backoff = 5;

    public function handle(UserRegistered $event): void
    {
        $user = $event->result->user;
        $contact = $event->result->contact;
        $password = $event->result->generatedPassword;

        // TODO: replace with real Sms service
        app(\App\Services\SmsService::class)->send(
            $contact->value ?? $contact->contact,
            "Welcome {$user->username}, password: {$password}"
        );
    }
}
