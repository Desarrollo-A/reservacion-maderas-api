<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        if ($request->routeIs('auth.login')) {
            return [
                'id' => $this['id'],
                'name' => $this['name'],
                'status' => $this['status']
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status
        ];
    }
}
