<?php

namespace App\Enums;

enum UserStatus: int
{
    case Inactive = 0;
    case Active = 1;
    case Suspended = 2;

    public function label(): string
    {
        return match ($this) {
            self::Inactive => 'غیرفعال',
            self::Active => 'فعال',
            self::Suspended => 'معلق',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Inactive => 'zinc',
            self::Active => 'green',
            self::Suspended => 'red',
        };
    }
}
