<?php

namespace App\Http\Requests\Role;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\RoleDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest implements IReturnDto
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:5',
                'max:50'
            ]
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): RoleDTO
    {
        return new RoleDTO(name: trim($this->name), status: true);
    }
}
