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
        $this->middleware('role.permission:'.NameRole::RECEPCIONIST->value.','.NameRole::ADMIN->value);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
