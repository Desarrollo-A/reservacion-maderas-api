<?php

namespace App\Repositories;

use App\Contracts\Repositories\ISubmenuRepository;
use App\Core\BaseRepository;
use App\Models\Submenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class SubmenuRepository extends BaseRepository implements ISubmenuRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Submenu $submenu)
    {
        $this->entity = $submenu;
    }

    public function findByUserId(int $userId): Collection
    {
        return $this->entity
            ->whereHas('users', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->orderBy('order')
            ->get();
    }
}
