<?php
namespace App\Enums;

enum RoleColor: int
{
    case BLUE = 1;
    case RED = 2;
    case PURPLE = 3;
    case VIOLET = 4;
    case EMERALD = 5;
    case CYAN = 6;
    case TEAL = 7;
    case INDIGO = 8;
    case FUCHSIA = 9;
    case ORANGE = 10;
    case AMBER = 11;
    case LIME = 12;


    public function label(): string
    {
        return match ($this) {
            self::BLUE => 'blue',
            self::RED => 'red',
            self::PURPLE => 'purple',
            self::VIOLET => 'violet',
            self::EMERALD => 'emerald',
            self::CYAN => 'cyan',
            self::TEAL => 'teal',
            self::INDIGO => 'indigo',
            self::FUCHSIA => 'fuchsia',
            self::ORANGE => 'orange',
            self::AMBER => 'amber',
            self::LIME => 'lime',
        };
    }
}
