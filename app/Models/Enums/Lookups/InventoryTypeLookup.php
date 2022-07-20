<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum InventoryTypeLookup: string
{
    case STATIONERY = 'Papelería';
    case MEDICINE = 'Botiquín';
    case CLEANING = 'Limpieza';
    case COFFEE = 'Cafetería';

    public static function getAll(): Collection
    {
        return collect([self::STATIONERY->value, self::MEDICINE->value, self::CLEANING->value, self::COFFEE->value]);
    }
}
