<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\IRoomService;
use App\Core\BaseApiController;
use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Resources\Room\RoomResource;
use App\Models\Enums\NameRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends BaseApiController
{
    private IRoomService $roomService;

    /**
     * @param IRoomService $roomService
     */
    public function __construct(IRoomService $roomService)
    {
        $this->middleware('role.permission:'.NameRole::RECEPCIONIST->value);
        $this->roomService = $roomService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
