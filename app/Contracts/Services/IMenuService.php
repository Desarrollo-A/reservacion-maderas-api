<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;

interface IMenuService extends IBaseService
{
    public function createDefaultMenu(int $userId, string $role): void;
}
