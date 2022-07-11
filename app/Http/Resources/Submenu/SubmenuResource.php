<?php

namespace App\Http\Resources\Submenu;

use Illuminate\Http\Resources\Json\JsonResource;

class SubmenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this['id'],
            'pathRoute' => $this['path_route'],
            'label' => $this['label'],
            'order' => $this['order'],
            'menuId' => $this['menu_id']
        ];
    }
}
