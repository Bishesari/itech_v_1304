<?php

namespace App\Enums;
enum EducationLevel: int
{
    case None = 0;
    case Primary = 1;
    case Secondary = 2;
    case Diploma = 3;
    case Associate = 4;
    case Bachelor = 5;
    case Master = 6;
    case Doctorate = 7;

    public function label(): string
    {
        return match ($this) {
            self::None => 'بیسواد',
            self::Primary => 'ابتدایی',
            self::Secondary => 'متوسطه',
            self::Diploma => 'دیپلم',
            self::Associate => 'فوق دیپلم',
            self::Bachelor => 'لیسانس',
            self::Master => 'فوق لیسانس',
            self::Doctorate => 'دکتری',
        };
    }
}
