<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum ServicesListLookup: string
{
    case ROOM = 'Sala de Juntas';
    case CAR = 'Automóvil';
    case DRIVER = 'Conductor';

    public static function getAll(): Collection
    {
        return collect([self::ROOM->value, self::CAR, self::DRIVER->value]);
    }
}
