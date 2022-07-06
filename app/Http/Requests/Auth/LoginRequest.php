<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest implements IReturnDto
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'noEmployee' => ['required', 'min:3', 'max:50'],
            'password' => ['required', 'min:8', 'max:50']
        ];
    }

    public function attributes(): array
    {
        return [
            'noEmployee' => 'Usuario'
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): UserDTO
    {
        return new UserDTO(noEmployee: $this->noEmployee, password: $this->password);
    }
}
