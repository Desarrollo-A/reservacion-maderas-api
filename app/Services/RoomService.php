<?php

namespace App\Services;

use App\Contracts\Repositories\ILookupRepository;
use App\Contracts\Repositories\IRoomRepository;
use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IRoomService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Helpers\Enum\QueryParam;
use App\Helpers\Validation;
use App\Models\Dto\RoomDTO;
use App\Models\Enums\Lookups\StatusRoomLookup;
use App\Models\Enums\TypeLookup;
use App\Models\Room;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;

class RoomService extends BaseService implements IRoomService
{
    protected IBaseRepository $entityRepository;
    protected ILookupRepository $lookupRepository;
    protected IUserRepository $userRepository;

    public function __construct(IRoomRepository $roomRepository,
                                ILookupRepository $lookupRepository,
                                IUserRepository $userRepository)
    {
        $this->entityRepository = $roomRepository;
        $this->lookupRepository = $lookupRepository;
        $this->userRepository = $userRepository;
    }

    public function create(RoomDTO|DataTransferObject $dto): Room
    {
        $dto->recepcionistId = $this->userRepository->findByOfficeIdAndRoleRecepcionist($dto->officeId)->id;
        $dto->statusId = $this->lookupRepository->findByNameAndType(StatusRoomLookup::ACTIVE->value,
            TypeLookup::STATUS_ROOM->value)->id;
        $room = $this->entityRepository->create($dto->only('name', 'office_id', 'no_people', 'recepcionist_id',
            'status_id')->toArray());

        return $room->fresh('status', 'office');
    }

    public function changeStatus(int $id, RoomDTO $roomDTO): void
    {
        $this->entityRepository->update($id, $roomDTO->only('status_id')->toArray());
    }

    /**
     * @throws \App\Exceptions\CustomErrorException
     */
    public function findAllPaginatedOffice(Request $request, User|Authenticatable $user, array $columns = ['*']): LengthAwarePaginator
    {
        $filters = Validation::getFilters($request->get(QueryParam::FILTERS_KEY));
        $perPage = Validation::getPerPage($request->get(QueryParam::PAGINATION_KEY));
        $sort = $request->get(QueryParam::ORDER_BY_KEY);
        return $this->entityRepository->findAllPaginatedOffice($user, $filters, $perPage, $sort, $columns);
    }
}
