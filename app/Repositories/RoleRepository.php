<?php

namespace App\Repositories;

use App\Contracts\Repositories\IRoleRepository;
use App\Core\BaseRepository;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Role $role)
    {
        $this->entity = $role;
    }

    public function findByName(string $name): Role
    {
        return $this->entity->where('name', $name)->firstOrFail();
    }
}
