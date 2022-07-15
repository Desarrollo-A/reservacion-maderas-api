<?php

namespace App\Models\Dto;

use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;

class OfficeDTO extends DataTransferObject
{
    public ?int $id;

    public ?string $name;

    public ?string $address;

    #[MapTo('state_id')]
    public ?int $stateId;
}
