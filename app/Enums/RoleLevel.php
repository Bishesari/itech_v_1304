<?php

namespace App\Enums;
enum RoleLevel: int
{
    case SYSTEM = 1;
    case INSTITUTE = 2;
    case BRANCH = 3;
    public function label(): string
    {
        return match ($this) {
            self::SYSTEM => 'سیستمی',
            self::INSTITUTE => 'آموزشگاه',
            self::BRANCH => 'شعبه',
        };
    }
}
