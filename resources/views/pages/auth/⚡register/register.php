<?php

use App\Data\RegistrationRequestData;
use App\Enums\ContactType;
use App\Enums\IdentifierType;
use App\Services\RegistrationRequestService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Layout('layouts::auth')]
#[Title('ثبت نام')]
class extends Component
{
    public string $first_name_fa = '';

    public string $last_name_fa = '';

    public string $n_code = '';

    public string $mobile = '';

    public function continueRegister(RegistrationRequestService $registrationRequestService): void
    {

        $validated = $this->validate();

        $data = RegistrationRequestData::fromValidated(
            data: $validated,
            identifierType: IdentifierType::NationalId,
            contactType: ContactType::MOBILE,
            ip: request()->ip(),
            userAgent: request()->userAgent(),
        );

        $result = $registrationRequestService->create($data);
        session([
            'registration_request_id' => $result->registrationRequest->id,
        ]);

    }

    protected function rules(): array
    {
        return [

            'first_name_fa' => [
                'required',
                'string',
                'max:40',
            ],

            'last_name_fa' => [
                'required',
                'string',
                'max:40',
            ],

            'n_code' => [
                'required',
                'digits:10',
            ],

            'mobile' => [
                'required',
                'digits:11',
                'regex:/^09[0-9]{9}$/',
            ],

        ];
    }
};
