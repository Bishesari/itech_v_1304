<?php

namespace App\Enums;
enum ContactRole: int
{
    case Self = 1;
    case Father = 2;
    case Mother = 3;
    case Guardian = 4;
    case Emergency = 5;
    case Work = 6;
}
