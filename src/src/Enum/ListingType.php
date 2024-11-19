<?php

namespace App\Enum;

enum PeriodType: string
{
    case PERSONAL = 'personal';
    case WORK = 'work';
    case ARCHIVED = 'archived';
}