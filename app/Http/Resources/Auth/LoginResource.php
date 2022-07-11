<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this['id'],
            'noEmployee' => $this['no_employee'],
            'fullName' => $this['full_name'],
            'email' => $this['email'],
            'token' => $this['token'],
            'role' => RoleResource::make($this['role'])
        ];
    }
}
