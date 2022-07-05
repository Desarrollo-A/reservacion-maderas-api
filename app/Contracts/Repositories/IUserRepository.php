<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\User;

interface IUserRepository extends IBaseRepository
{
    public function findByEmail(string $email): User;
}
