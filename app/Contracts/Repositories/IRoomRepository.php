<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Room;

/**
 * @method Room create(array $data)
 * @method Room findById(int $id)
 */
interface IRoomRepository extends IBaseRepository
{
    //
}
