<?php

namespace App\Services;

use App\Contracts\Services\IRoleService;
use App\Core\Contracts\IBaseRepository;
use App\Contracts\Repositories\IRolerepository;
use App\Core\BaseService;
use App\Core\Contracts\IBaseService;


class RoleService extends BaseService implements IRoleService
{
    protected IBaseRepository $entityRepository;
    public function __construct(IRoleRepository $roleRepository)
    {
        $this->entityRepository = $roleRepository;
        
    }
}
