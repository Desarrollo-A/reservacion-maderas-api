<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Role;

interface IRoleRepository extends IBaseRepository
{
    public function findByName(string $name): Role;
}
