<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 1;
    case Female = 2;

    public function label(): string
    {
        return match ($this) {
            self::Male => 'مرد',
            self::Female => 'زن',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Male => 'blue',
            self::Female => 'pink',
        };
    }
}
