<?php

namespace App\Repositories;

use App\Contracts\Repositories\IOfficeRepository;
use App\Core\BaseRepository;
use App\Models\Office;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class OfficeRepository extends BaseRepository implements IOfficeRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Office $office)
    {
        $this->entity = $office;
    }

    public function findByName(string $name)
    {
        return $this->entity->where('name', $name)->firstOrFail();
    }
}
