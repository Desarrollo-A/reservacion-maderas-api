<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\User;

/**
 * @method User findById(int $id)
 * @method User update(int $id, array $data)
 */
interface IUserRepository extends IBaseRepository
{
    public function findByEmail(string $email): User;

    public function findByNoEmployee(string $noEmployee): User;
}
