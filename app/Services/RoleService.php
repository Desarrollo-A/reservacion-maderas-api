<?php

namespace App\Services;

use App\Contracts\Repositories\IRoleRepository;
use App\Contracts\Services\IRoleService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;

class RoleService extends BaseService implements IRoleService
{
    protected IBaseRepository $entityRepository;

    public function __construct(IRoleRepository $roleRepository)
    {
        $this->entityRepository = $roleRepository;
    }
}
