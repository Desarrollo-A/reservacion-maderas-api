<?php

namespace App\Repositories;

use App\Contracts\Repositories\IRoomRepository;
use App\Core\BaseRepository;
use App\Models\Enums\NameRole;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomRepository extends BaseRepository implements IRoomRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Room $room)
    {
        $this->entity = $room;
    }

    public function findAllPaginatedOffice(User $user, array $filters, int $limit, string $sort = null,
                                           array $columns = ['*']): LengthAwarePaginator
    {
        $query = $this->entity->with('status');

        if ($user->role->name === NameRole::RECEPCIONIST->value) {
            $query->filterOffice($user->office_id);
        }

        return $query
            ->filter($filters)
            ->applySort($sort)
            ->paginate($limit, $columns);
    }

    public function findById(int $id): Room
    {
        return $this->entity
            ->with('status', 'office')
            ->findOrFail($id);
    }
}
