<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Lookup;
use Illuminate\Database\Eloquent\Collection;

interface ILookupRepository extends IBaseRepository
{
    public function findAllByType(int $type, array $columns = ['*']): Collection;

    public function findByNameAndType(string $name, int $type): Lookup;
}
