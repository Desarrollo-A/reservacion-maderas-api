<?php

namespace App\Models\Dto;

use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;


class UserDTO extends DataTransferObject
{
    public ?int $id;

    #[MapTo('no_employee')]
    public ?string $noEmployee;

    #[MapTo('full_name')]
    public ?string $fullName;

    public ?string $email;

    public ?string $password;

    #[MapTo('personal_phone')]
    public ?string $personalPhone;

    #[MapTo('office_phone')]
    public ?string $officePhone;

    public ?int $status;

    public ?int $roleId;
}
