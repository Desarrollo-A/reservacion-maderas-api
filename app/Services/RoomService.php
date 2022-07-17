<?php

namespace App\Services;

use App\Contracts\Repositories\IRoomRepository;
use App\Contracts\Services\IRoomService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;

class RoomService extends BaseService implements IRoomService
{
    protected IBaseRepository $entityRepository;

    public function __construct(IRoomRepository $roomRepository)
    {
        $this->entityRepository = $roomRepository;
    }
}
