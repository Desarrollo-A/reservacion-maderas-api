<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;
use App\Models\Dto\UserDTO;
use App\Models\User;
use Illuminate\Support\Collection;

interface IAuthService extends IBaseService
{
    public function changePassword(UserDTO $userDTO): void;

    public function getNavigationMenu(int $userId): Collection;

    public function getUser(int $id): User;

    public function login(string $noEmployee, string $password): Collection;

    public function restorePassword(string $email): void;
}
