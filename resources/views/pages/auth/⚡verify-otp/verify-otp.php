<?php

use App\Models\RegistrationRequest;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts::auth')]
#[Title('ثبت نام')]
class extends Component
{
    public string $code = '';

    public ?int $registrationRequestId = null;

    public ?RegistrationRequest $registrationRequest = null;

    public function mount(): void
    {
        $this->registrationRequestId = session(
            'registration_request_id'
        );

        $this->registrationRequest = RegistrationRequest::findOrFail(
            $this->registrationRequestId
        );
        dd($this->registrationRequest);
    }

    public function verify(): void
    {
        //
    }
};
