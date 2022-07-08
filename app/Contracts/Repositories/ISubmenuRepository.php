<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use Illuminate\Database\Eloquent\Collection;

interface ISubmenuRepository extends IBaseRepository
{
    public function findByUserId(int $userId): Collection;
}
