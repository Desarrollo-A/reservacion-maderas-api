<?php

namespace App\Services;

use App\Contracts\Repositories\ILookupRepository;
use App\Contracts\Repositories\IOfficeRepository;
use App\Contracts\Repositories\IRoleRepository;
use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IUserService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Models\Dto\UserDTO;
use App\Models\Enums\Lookups\StatusUserLookup;
use App\Models\Enums\NameRole;
use App\Models\Enums\TypeLookup;
use App\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class UserService extends BaseService implements IUserService
{
    protected IBaseRepository $entityRepository;
    protected IRoleRepository $roleRepository;
    protected ILookupRepository $lookupRepository;
    protected IOfficeRepository $officeRepository;

    public function __construct(IUserRepository $userRepository,
                                IRoleRepository $roleRepository,
                                ILookupRepository $lookupRepository,
                                IOfficeRepository $officeRepository)
    {
        $this->entityRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->lookupRepository = $lookupRepository;
        $this->officeRepository = $officeRepository;
    }

    public function create(UserDTO|DataTransferObject $dto): User
    {
        $dto->statusId = $this->lookupRepository
            ->findByNameAndType(StatusUserLookup::ACTIVE->value, TypeLookup::STATUS_USER->value)->id;
        $dto->officeId = $this->officeRepository->findByName($dto->office->name)->id;
        if ($dto->role->name === NameRole::RECEPCIONIST->value) {
            $dto->roleId = $this->roleRepository->findByName('Recepción')->id;
        } else {
            $dto->roleId = $this->roleRepository->findByName('Solicitante')->id;
        }

        $data = $dto->only('no_employee', 'full_name', 'email', 'password', 'personal_phone', 'office_phone',
            'position', 'area', 'status_id', 'role_id', 'office_id')
            ->toArray();

        $user = $this->entityRepository->create($data);
        return $this->entityRepository->findById($user->id);
    }
}
