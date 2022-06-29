<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrador',
            'status' => true
        ]);
        Role::create([
            'name' => 'Recepción',
            'status' => true
        ]);
        Role::create([
            'name' => 'Solicitante',
            'status' => true
        ]);
    }
}
