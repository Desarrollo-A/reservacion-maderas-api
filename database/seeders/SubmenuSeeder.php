<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Database\Seeder;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requestMenu = Menu::query()->where('path_route', '/dashboard/solicitud')->first()->id;
        $historyMenu = Menu::query()->where('path_route', '/dashboard/historial')->first()->id;

        Submenu::create([
            'path_route' => '/sala',
            'label' => 'Salas de Junta',
            'order' => 1,
            'menu_id' => $requestMenu
        ]);

        Submenu::create([
            'path_route' => '/auto',
            'label' => 'Automóvil',
            'order' => 2,
            'menu_id' => $requestMenu
        ]);

        Submenu::create([
            'path_route' => '/conductor',
            'label' => 'Conductor',
            'order' => 3,
            'menu_id' => $requestMenu
        ]);

        Submenu::create([
            'path_route' => '/sala',
            'label' => 'Salas de Junta',
            'order' => 1,
            'menu_id' => $historyMenu
        ]);

        Submenu::create([
            'path_route' => '/auto',
            'label' => 'Automóvil',
            'order' => 2,
            'menu_id' => $historyMenu
        ]);

        Submenu::create([
            'path_route' => '/conductor',
            'label' => 'Conductor',
            'order' => 3,
            'menu_id' => $historyMenu
        ]);
    }
}
