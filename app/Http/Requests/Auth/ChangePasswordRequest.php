<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest implements IReturnDto
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'min:5', 'max:50']
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): UserDTO
    {
        return new UserDTO(id: auth()->id(), password: bcrypt($this->password));
    }
}
