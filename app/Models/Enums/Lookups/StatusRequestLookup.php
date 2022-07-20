<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum StatusRequestLookup: string
{
    case NEW = 'Nueva';
    case APPROVED = 'Aprobada';
    case REJECTED = 'Rechazada';
    case PROPOSAL = 'Propuesta';
    case CANCELLED = 'Cancelada';
    case WITHOUT_ATTENDING = 'Sin asistir';

    public static function getAll(): Collection
    {
        return collect([self::NEW->value, self::APPROVED->value, self::REJECTED->value, self::PROPOSAL->value,
            self::CANCELLED->value, self::WITHOUT_ATTENDING->value]);
    }
}
