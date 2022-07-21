<?php

namespace App\Contracts\Services;

use App\Core\Contracts\IBaseService;
use App\Models\Dto\RoomDTO;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @method Room create(\Spatie\DataTransferObject\DataTransferObject $dto)
 */
interface IRoomService extends IBaseService
{
    public function changeStatus(int $id, RoomDTO $roomDTO): void;

    public function findAllPaginatedOffice(Request $request, User $user, array $columns = ['*']): LengthAwarePaginator;
}
