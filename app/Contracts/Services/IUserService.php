<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;
use App\Models\User;

/**
 * @method User create(\Spatie\DataTransferObject\DataTransferObject $dto)
 */
interface IUserService extends IBaseService
{
    //
}
