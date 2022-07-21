<?php

namespace App\Models\Dto;

use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;

class RoomDTO extends DataTransferObject
{
    public ?int $id;

    public ?string $code;

    public ?string $name;

    #[MapTo('office_id')]
    public ?int $officeId;

    #[MapTo('no_people')]
    public ?int $noPeople;

    #[MapTo('recepcionist_id')]
    public ?int $recepcionistId;

    #[MapTo('status_id')]
    public ?int $statusId;
}
