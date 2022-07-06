<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Lookup\LookupResource;
use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'no_employee' => $this->no_employee,
            'fullName' => $this->full_name,
            'email' => $this->email,
            'personalPhone' => $this->personal_phone,
            'officPhone' => $this->office_phone,
            'position' => $this->position,
            'area' => $this->area,
            'role' => RoleResource::make($this->whenLoaded('role')),
            'status' => LookupResource::make($this->whenLoaded('lookup'))
        ];
    }
}
