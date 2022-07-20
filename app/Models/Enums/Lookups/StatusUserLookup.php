<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum StatusUserLookup: string
{
    case ACTIVE = 'Activo';
    case INACTIVE = 'Inactivo';
    case BLOCKED = 'Bloqueado';

    public static function getAll(): Collection
    {
        return collect([self::ACTIVE->value, self::INACTIVE->value, self::BLOCKED->value]);
    }
}
