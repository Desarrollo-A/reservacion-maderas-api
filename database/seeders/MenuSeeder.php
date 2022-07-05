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
    }
}
