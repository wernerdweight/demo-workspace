<?php

namespace App\Enum;

enum PeriodType: string
{
    case DAY = 'day';
    case WEEK = 'week';
    case MONTH = 'month';
}