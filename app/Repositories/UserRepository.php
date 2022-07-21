<?php

namespace App\Repositories;

use App\Contracts\Repositories\IUserRepository;
use App\Core\BaseRepository;
use App\Exceptions\CustomErrorException;
use App\Models\Enums\NameRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class UserRepository extends BaseRepository implements IUserRepository
{
    protected Builder|Model|QueryBuilder $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function findById(int $id): User
    {
        return $this->entity->with('lookup', 'role')->findOrFail($id);
    }

    public function findByEmail(string $email): User
    {
        return $this->entity
            ->with('lookup')
            ->where('email', $email)
            ->firstOrFail();
    }

    public function findByNoEmployee(string $noEmployee): User
    {
        return $this->entity
            ->with('lookup', 'role')
            ->where('no_employee', $noEmployee)
            ->firstOrFail();
    }

    public function findByOfficeIdAndRoleRecepcionist(string $oficeId): User
    {
        return $this->entity
            ->whereHas('role', function (Builder $query) {
                $query->where('name', NameRole::RECEPCIONIST->value);
            })
            ->where('office_id', $oficeId)
            ->firstOr(function () {
                throw new CustomErrorException('No hay una recepcionista asignada en esta oficina.',
                    Response::HTTP_BAD_REQUEST);
            });
    }
}
