<?php

namespace App\Http\Requests\Room;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\RoomDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest implements IReturnDto
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:120'],
            'noPeople' => ['required', 'integer', 'between:1,100']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nombre',
            'noPeople' => 'No. de Personas'
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): RoomDTO
    {
        $user = auth()->user();
        return new RoomDTO(
            name: trim($this->name),
            officeId: $user->office_id,
            noPeople: $this->noPeople,
            recepcionistId: $user->id
        );
    }
}
