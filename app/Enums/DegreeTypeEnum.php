<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum DegreeTypeEnum: string
{
    use BaseEnum;

    case CELSIUS = 'celsius';

    case FAHRENHEIT = 'fahrenheit';
}