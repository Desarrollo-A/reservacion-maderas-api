<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum UnitTypeLookup: string
{
    case PART = 'Pieza';
    case BOX = 'Caja';
    case PACKAGE = 'Paquete';
    case KILO = 'Kilo';
    case GALLON = 'Galón';
    case CARAFE = 'Garrafa';
    case PAIR = 'Par';
    case BAG = 'Bolsa';
    case CAN = 'Bote';

    public static function getAll(): Collection
    {
        return collect([self::PART->value, self::BOX->value, self::PACKAGE->value, self::KILO->value, self::GALLON->value,
            self::CARAFE->value, self::PAIR->value, self::BAG->value, self::CAN->value]);
    }
}
