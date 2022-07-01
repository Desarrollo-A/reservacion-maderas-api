<?php

namespace App\Models\Enums;

enum StatusUser: int
{
    case Inactive = 0;
    case Active = 1;
    case Blocked = 2;
}
