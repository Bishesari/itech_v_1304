<?php

namespace App\Enums;
enum MilitaryStatus: int
{
    case Unknown = 0;
    case Completed = 1;
    case Exempted = 2;
    case InService = 3;

    public function label(): string
    {
        return match ($this) {
            self::Completed => 'پایان خدمت',
            self::Exempted => 'معاف',
            self::InService => 'در حال خدمت',
            self::Unknown => 'نامشخص',
        };
    }
}
