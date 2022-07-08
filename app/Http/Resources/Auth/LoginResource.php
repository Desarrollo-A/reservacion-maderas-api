<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

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
            'menu' => $this->getMenu($this['menu'])
        ];
    }

    private function getMenu(Collection $menus): array
    {
        $menusArr = [];
        foreach ($menus as $menu) {
            $pathRoute = count($menu['submenu']) === 0 ? $menu['path_route'] : null;
            $menusArr[] = [
                'id' => $menu['id'],
                'pathRoute' => $pathRoute,
                'label' => $menu['label'],
                'icon' => $menu['icon'],
                'order' => $menu['order'],
                'submenu' => $this->getSubmenus($menu, $menu['submenu']),
            ];
        }
        return $menusArr;
    }

    private function getSubmenus(Collection $menu, Collection $submenus): array
    {
        $submenusArr = [];
        foreach ($submenus as $submenu) {
            $submenusArr[] = [
                'id' => $submenu['id'],
                'pathRoute' => $menu['path_route'].$submenu['path_route'],
                'label' => $submenu['label'],
                'order' => $submenu['order'],
                'menuId' => $submenu['menu_id']
            ];
        }
        return $submenusArr;
    }
}
