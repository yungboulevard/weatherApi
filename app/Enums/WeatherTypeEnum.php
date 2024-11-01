<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum WeatherTypeEnum: string
{
    use BaseEnum;

    case CURRENT = 'current';

    case FORECAST = 'forecast';
}