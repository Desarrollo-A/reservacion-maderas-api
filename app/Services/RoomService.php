<?php

namespace App\Services;

use App\Contracts\Repositories\ILookupRepository;
use App\Contracts\Repositories\IRoomRepository;
use App\Contracts\Services\IRoomService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Models\Dto\RoomDTO;
use App\Models\Enums\TypeLookup;
use App\Models\Room;
use Spatie\DataTransferObject\DataTransferObject;

class RoomService extends BaseService implements IRoomService
{
    protected IBaseRepository $entityRepository;
    protected ILookupRepository $lookupRepository;

    public function __construct(IRoomRepository $roomRepository,
                                ILookupRepository $lookupRepository)
    {
        $this->entityRepository = $roomRepository;
        $this->lookupRepository = $lookupRepository;
    }
}
