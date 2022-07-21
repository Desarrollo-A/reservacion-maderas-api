<?php

namespace App\Models\Enums\Lookups;

enum StatusRoomLookup: string
{
    case ACTIVE = 'Activa';
    case DOWN = 'Baja';
    case MAINTENANCE = 'Mantenimiento';
}
