<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\User;

/**
 * @method User findById(int $id)
 */
interface IUserRepository extends IBaseRepository
{
    public function findByEmail(string $email): User;

    public function findByNoEmployee(string $noEmployee): User;
}
