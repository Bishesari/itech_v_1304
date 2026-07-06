<?php

namespace App\Enums;
enum ContactRole: int
{
    case Self = 1;
    case Father = 2;
    case Mother = 3;
    case Guardian = 4;
    case Emergency = 5;
    case Office = 6;

    public function label(): string
    {
        return match ($this) {
            self::Self => 'خود شخص',
            self::Father => 'پدر',
            self::Mother => 'مادر',
            self::Guardian => 'سرپرست',
            self::Emergency => 'تماس اضطراری',
            self::Office => 'محل کار',
        };
    }
}
