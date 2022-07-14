<?php

namespace App\Repositories;

use App\Contracts\Repositories\ILookupRepository;
use App\Core\BaseRepository;
use App\Models\Lookup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class LookupRepository extends BaseRepository implements ILookupRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Lookup $lookup)
    {
        $this->entity = $lookup;
    }

    public function findByNameAndType(string $name, int $type): Lookup
    {
        return $this->entity
            ->where('name', $name)
            ->where('type', $type)
            ->firstOrFail();
    }
}
