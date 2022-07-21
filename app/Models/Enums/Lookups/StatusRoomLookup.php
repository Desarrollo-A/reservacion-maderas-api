<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum StatusRoomLookup: string
{
    case ACTIVE = 'Activa';
    case DOWN = 'Baja';
    case MAINTENANCE = 'Mantenimiento';

    public static function getAll(): Collection
    {
        return collect([self::ACTIVE->value, self::DOWN->value, self::MAINTENANCE->value]);
    }
}
