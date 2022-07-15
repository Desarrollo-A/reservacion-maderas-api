<?php

namespace App\Services;

use App\Contracts\Repositories\IMenuRepository;
use App\Contracts\Repositories\ISubmenuRepository;
use App\Contracts\Repositories\IUserRepository;
use App\Contracts\Services\IMenuService;
use App\Core\BaseService;
use App\Core\Contracts\IBaseRepository;
use App\Models\Enums\NameRole;
use App\Models\Enums\ViewsDefault;
use Illuminate\Support\Collection;

class MenuService extends BaseService implements IMenuService
{
    protected IBaseRepository $entityRepository;
    protected ISubmenuRepository $submenuRepository;
    protected IUserRepository $userRepository;

    public function __construct(IMenuRepository $menuRepository,
                                ISubmenuRepository $submenuRepository,
                                IUserRepository $userRepository)
    {
        $this->entityRepository = $menuRepository;
        $this->submenuRepository = $submenuRepository;
        $this->userRepository = $userRepository;
    }

    public function createDefaultMenu(int $userId, string $role): void
    {
        if ($role === NameRole::RECEPCIONIST->value) {
            $menus = collect(ViewsDefault::VIEWS_DEFAULT_RECEPCIONIST)
                ->map(function ($menu) {
                    return $this->entityRepository->findByPathRoute($menu['path'])->id;
                })
                ->values();

            $submenus = collect(ViewsDefault::VIEWS_DEFAULT_RECEPCIONIST)
                ->flatMap(function ($menu) {
                    $menuId = $this->entityRepository->findByPathRoute($menu['path'])->id;
                    return collect($menu['submenus'])
                        ->map(function ($submenu) use ($menuId) {
                            return $this->submenuRepository->findByPathRouteAndMenuId($submenu['path'], $menuId)->id;
                        });
                })
                ->values();
        } else if ($role === NameRole::APPLICANT->value) {
            $menus = collect(ViewsDefault::VIEWS_DEFAULT_APPLICANT)
                ->map(function ($menu) {
                    return $this->entityRepository->findByPathRoute($menu['path'])->id;
                })
                ->values();

            $submenus = collect(ViewsDefault::VIEWS_DEFAULT_APPLICANT)
                ->flatMap(function ($menu) {
                    $menuId = $this->entityRepository->findByPathRoute($menu['path'])->id;
                    return collect($menu['submenus'])
                        ->map(function ($submenu) use ($menuId) {
                            return $this->submenuRepository->findByPathRouteAndMenuId($submenu['path'], $menuId)->id;
                        });
                })
                ->values();
        }

        $user = $this->userRepository->findById($userId);
        $user->menus()->attach($menus);
        $user->submenus()->attach($submenus);
    }
}
