<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IRoomService;
use App\Core\BaseApiController;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Resources\Room\RoomResource;
use App\Models\Enums\NameRole;
use Illuminate\Http\JsonResponse;

class RoomController extends BaseApiController
{
    private IRoomService $roomService;

    /**
     * @param IRoomService $roomService
     */
    public function __construct(IRoomService $roomService)
    {
        $this->middleware('role.permission:'.NameRole::ADMIN->value)
            ->only('store');
        $this->middleware('role.permission:'.NameRole::ADMIN->value.','.NameRole::RECEPCIONIST->value)
            ->only('show');
        $this->roomService = $roomService;
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $roomDTO = $request->toDTO();
        $room = $this->roomService->create($roomDTO);
        return $this->showOne(new RoomResource($room));
    }

    public function show(int $id): JsonResponse
    {
        $room = $this->roomService->findById($id);
        return $this->showOne(new RoomResource($room));
    }
}
