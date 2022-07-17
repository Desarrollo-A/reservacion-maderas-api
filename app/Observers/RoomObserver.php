<?php

namespace App\Observers;

use App\Contracts\Repositories\IRoomRepository;
use App\Models\Dto\RoomDTO;
use App\Models\Room;

class RoomObserver
{
    private IRoomRepository $roomRepository;

    public function __construct(IRoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * Handle the Room "created" event.
     *
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function created(Room $room): void
    {
        $roomDTO = new RoomDTO(code: Room::INITIAL_CODE.$room->id);
        $this->roomRepository->update($room->id, $roomDTO->only('code')->toArray());
    }
}
