<?php

namespace App\Enums;
enum MaritalStatus: int
{
    case Single = 1;
    case Married = 2;
    case Divorced = 3;
    case Widowed = 4;

    public function label(): string
    {
        return match ($this) {
            self::Single => 'مجرد',
            self::Married => 'متأهل',
            self::Divorced => 'طلاق گرفته',
            self::Widowed => 'همسر فوت شده',
        };
    }
}
