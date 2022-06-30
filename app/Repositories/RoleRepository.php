<?php

namespace App\Repositories;

use App\Contracts\Repositories\IRolerepository;
use App\Core\BaseRepository;
use App\Models\Role;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class RoleReposotory extends BaseRepository implements IRolerepository
{
    protected  Builder|Model|QueryBuilder $entity;
    public function __construct(Role $role){
        $this->entity = $role;
    }
    
}