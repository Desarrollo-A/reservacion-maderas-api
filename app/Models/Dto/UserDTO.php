<?php

namespace App\Models\Dto;

use Spatie\DataTransferObject\DataTransferObject;


class UserDTO extends DataTransferObject
{
    public ?int $id;

    public ?string $fullName;

    public ?string $email;

    public ?string $password;

    public ?string $personalPhone;

    public ?string $officePhone;

    public ?int $status;

    public ?int $roleId;
}
