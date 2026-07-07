<?php

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

    public function continueRegister()
    {
        $validated = $this->validate();
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
                'max:50',
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
