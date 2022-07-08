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
            'path_route' => '/dashboard/home',
            'label' => 'Inicio',
            'icon' => 'mat:insights',
            'order' => 1
        ]);

        Menu::create([
            'path_route' => '/dashboard/solicitud',
            'label' => 'Solicitudes',
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
    }
}
