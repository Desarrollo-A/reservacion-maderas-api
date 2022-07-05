<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;

interface IAuthService extends IBaseService
{
    public function login(string $email, string $password): string;
}
