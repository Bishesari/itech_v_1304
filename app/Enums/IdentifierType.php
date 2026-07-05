<?php

namespace App\Enums;

enum IdentifierType: int
{
    case NationalId = 1;
    case ForeignerId = 2;
    case Passport = 3;

    public function label(): string
    {
        return match ($this) {
            self::NationalId => 'کدملی',
            self::ForeignerId => 'شناسه اتباع خارجی',
            self::Passport => 'گذرنامه',
        };
    }
}
