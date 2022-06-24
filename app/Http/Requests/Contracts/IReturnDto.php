<?php

namespace App\Http\Requests\Contracts;

interface IReturnDto
{
    public function toDTO(): \Spatie\DataTransferObject\DataTransferObject;
}
