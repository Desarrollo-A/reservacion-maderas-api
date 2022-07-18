<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'path_route' => '/dashboard/usuario',
            'label' => 'Usuario',
            'icon' => 'mat:groups',
            'order' => 1
        ]);

        Menu::create([
            'path_route' => '/dashboard/solicitud',
            'label' => 'Reservaciones',
            'icon' => 'mat:note_add',
            'order' => 2
        ]);

        Menu::create([
            'path_route' => '/dashboard/historial',
            'label' => 'Historial',
            'icon' => 'mat:history',
            'order' => 3
        ]);

        Menu::create([
            'path_route' => '/dashboard/calendario',
            'label' => 'Calendario',
            'icon' => 'mat:calendar_month',
            'order' => 4
        ]);

        Menu::create([
            'path_route' => '/dashboard/inventario',
            'label' => 'Inventario',
            'icon' => 'mat:inventory_2',
            'order' => 5
        ]);

        Menu::create([
            'path_route' => '/dashboard/reporte',
            'label' => 'Reportes',
            'icon' => 'mat:auto_graph',
            'order' => 6
        ]);

        Menu::create([
            'path_route' => '/dashboard/mantenimiento',
            'label' => 'Mantenimiento',
            'icon' => 'mat:engineering',
            'order' => 7
        ]);
    }
}
