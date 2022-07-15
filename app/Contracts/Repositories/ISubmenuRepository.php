<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Submenu;
use Illuminate\Database\Eloquent\Collection;

interface ISubmenuRepository extends IBaseRepository
{
    public function findByUserId(int $userId): Collection;

    public function findByPathRouteAndMenuId(string $path, int $menuId): Submenu;
}
