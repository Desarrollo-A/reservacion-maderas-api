<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Lookup;

interface ILookupRepository extends IBaseRepository
{
    public function findByNameAndType(string $name, int $type): Lookup;
}
