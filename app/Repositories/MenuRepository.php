<?php

namespace App\Repositories;

use App\Contracts\Repositories\IMenuRepository;
use App\Core\BaseRepository;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class MenuRepository extends BaseRepository implements IMenuRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(Menu $menu)
    {
        $this->entity = $menu;
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

    public function findByPathRoute(string $path): Menu
    {
        return $this->entity->where('path_route', $path)->firstOrFail();
    }
}
