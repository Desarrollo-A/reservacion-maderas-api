<?php

namespace App\Http\Requests\Room;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\RoomDTO;
use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusRoomRequest extends FormRequest implements IReturnDto
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'statusId' => ['required', 'integer']
        ];
    }

    public function attributes()
    {
        return ['statusId' => 'Estatus'];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): RoomDTO
    {
        return new RoomDTO(statusId: $this->statusId);
    }
}
