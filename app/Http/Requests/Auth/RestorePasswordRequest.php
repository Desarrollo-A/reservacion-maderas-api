<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class RestorePasswordRequest extends FormRequest implements IReturnDto
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:dns', 'max:150']
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): UserDTO
    {
        return new UserDTO(email: $this->email);
    }
}
