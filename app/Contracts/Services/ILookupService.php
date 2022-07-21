<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;

interface ILookupService extends IBaseService
{
    public function validateLookup(int $lookupId, int $type, string $message = 'Lookup no válido'): void;
}
