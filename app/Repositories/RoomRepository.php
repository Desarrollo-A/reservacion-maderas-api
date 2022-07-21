<?php

namespace App\Repositories;

use App\Contracts\Repositories\IRoomRepository;
use App\Core\BaseRepository;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class RoomRepository extends BaseRepository implements IRoomRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Room $room)
    {
        $this->entity = $room;
    }

    public function findById(int $id): Room
    {
        return $this->entity
            ->with('status', 'office')
            ->findOrFail($id);
    }
}
