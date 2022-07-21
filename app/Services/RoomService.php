<?php

namespace App\Services;

use App\Contracts\Repositories\ILookupRepository;
use App\Contracts\Repositories\IRoomRepository;
use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IRoomService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Models\Dto\RoomDTO;
use App\Models\Enums\Lookups\StatusRoomLookup;
use App\Models\Enums\TypeLookup;
use App\Models\Room;
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
}
