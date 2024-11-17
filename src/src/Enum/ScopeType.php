<?php

namespace App\Enum;

enum ScopeType: string
{
    case CURRENT = 'current';
    case NEXT = 'next';
}