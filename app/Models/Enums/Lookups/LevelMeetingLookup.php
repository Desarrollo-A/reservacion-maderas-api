<?php

namespace App\Models\Enums\Lookups;

use Illuminate\Support\Collection;

enum LevelMeetingLookup: string
{
    case ADMINISTRATIVE = 'Administrativa';
    case DIRECTIVE = 'Directiva';

    public static function getAll(): Collection
    {
        return collect([self::ADMINISTRATIVE->value, self::DIRECTIVE->value]);
    }
}
