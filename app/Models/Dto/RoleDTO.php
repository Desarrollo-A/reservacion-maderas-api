<?php

namespace App\Models\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class RoleDTO extends DataTransferObject
{
    public ?int $id;

    public ?string $name;

    public ?bool $status;
}
