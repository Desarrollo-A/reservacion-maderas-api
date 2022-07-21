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
            'name' => ['required', 'min:3', 'max:120'],
            'officeId' => ['required', 'integer'],
            'noPeople' => ['required', 'integer', 'between:1,100']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nombre',
            'officeId' => 'Oficina',
            'noPeople' => 'No. de Personas'
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): RoomDTO
    {
        return new RoomDTO(
            name: trim($this->name),
            officeId: $this->officeId,
            noPeople: $this->noPeople
        );
    }
}
