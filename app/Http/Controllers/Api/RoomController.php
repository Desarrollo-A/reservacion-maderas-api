<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\ILookupService;
use App\Contracts\Services\IRoomService;
use App\Core\BaseApiController;
use App\Http\Requests\Room\ChangeStatusRoomRequest;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Resources\Room\RoomResource;
use App\Models\Enums\NameRole;
use App\Models\Enums\TypeLookup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class RoomController extends BaseApiController
{
    private IRoomService $roomService;
    private ILookupService $lookupService;

    public function __construct(IRoomService $roomService, ILookupService $lookupService)
    {
        $this->middleware('role.permission:'.NameRole::ADMIN->value)
            ->only('store');
        $this->middleware('role.permission:'.NameRole::ADMIN->value.','.NameRole::RECEPCIONIST->value)
            ->only('show', 'changeStatus');
        $this->roomService = $roomService;
        $this->lookupService = $lookupService;
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

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function changeStatus(int $id, ChangeStatusRoomRequest $request): Response
    {
        $roomDTO = $request->toDTO();
        $this->lookupService->validateLookup($roomDTO->statusId, TypeLookup::STATUS_ROOM->value, 'Estatus no válido.');
        $this->roomService->changeStatus($id, $roomDTO);
        return $this->noContentResponse();
    }
}
