<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Contracts\IReturnDto;
use App\Models\Dto\OfficeDTO;
use App\Models\Dto\RoleDTO;
use App\Models\Dto\UserDTO;
use App\Models\Enums\NameRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest implements IReturnDto
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'noEmployee' => ['required', 'max:50', 'unique:users,no_employee'],
            'fullName' => ['required', 'max: 150'],
            'email' => ['required', 'email:dns', 'max: 150', 'unique:users'],
            'password' => ['required', 'min:5', 'max: 50'],
            'personalPhone' => ['required', 'min:10', 'max:10'],
            'officePhone' => ['nullable', 'min:10', 'max:10'],
            'position' => ['required', 'max:100'],
            'area' => ['required', 'max:100'],
            'isRecepcionist' => ['required', 'bail', 'boolean'],
            'office.name' => [Rule::requiredIf($this->isRecepcionist)]
        ];
    }

    public function attributes()
    {
        return [
            'noEmployee' => 'Usuario',
            'fullName' => 'Nombre completo',
            'personalPhone' => 'Teléfono personal',
            'officePhone' => 'Teléfono de oficina',
            'position' => 'Puesto',
            'area' => 'Área / Departamento',
            'isRecepcionist' => 'Recepcionista',
            'office.name' => 'Oficina'
        ];
    }

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function toDTO(): UserDTO
    {
        $office = new OfficeDTO(name: trim($this->office['name']));
        $role = new RoleDTO(name: ($this->isRecepcionist) ? NameRole::RECEPCIONIST->value : NameRole::APPLICANT->value);

        return new UserDTO(
            noEmployee: trim($this->noEmployee),
            fullName: trim($this->fullName),
            email: trim($this->email),
            password: bcrypt($this->password),
            personalPhone: trim($this->personalPhone),
            officePhone: isset($this->officePhone) ? trim($this->officePhone) : $this->officePhone,
            position: trim($this->position),
            area: trim($this->area),
            role: $role,
            office: $office
        );
    }
}
