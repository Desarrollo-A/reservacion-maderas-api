<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;

interface IOfficeRepository extends IBaseRepository
{
    public function findByName(string $name);
}
