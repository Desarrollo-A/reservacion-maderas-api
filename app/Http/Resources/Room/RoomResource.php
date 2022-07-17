<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'officeId' => $this->office_id,
            'noPeople' => $this->no_people,
            'recepcionistId' => $this->recepcionist_id,
            'statusId' => $this->status_id,
        ];
    }
}
