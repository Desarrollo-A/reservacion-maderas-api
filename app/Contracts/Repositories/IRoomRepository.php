<?php

namespace App\Contracts\Repositories;

use App\Core\Contracts\IBaseRepository;
use App\Models\Room;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @method Room create(array $data)
 * @method Room findById(int $id)
 */
interface IRoomRepository extends IBaseRepository
{
    public function findAllPaginatedOffice(User $user, array $filters, int $limit, string $sort = null,
                                               array $columns = ['*']): LengthAwarePaginator;
}
