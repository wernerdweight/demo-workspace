<?php

namespace App\Enum;

enum ListingType: string
{
    case PERSONAL = 'personal';
    case WORK = 'work';
    case ARCHIVED = 'archived';
}