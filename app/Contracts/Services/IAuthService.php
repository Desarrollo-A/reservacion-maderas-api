<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;
use App\Models\User;

interface IAuthService extends IBaseService
{
    public function getUser(int $id): User;

    public function login(string $noEmployee, string $password): string;
}
