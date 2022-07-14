<?php

namespace Database\Seeders;

use App\Models\Enums\TypeLookup;
use App\Models\Lookup;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'no_employee' => 'CIB00000',
            'full_name' => 'Administrador TI',
            'email' => 'admin@ciudadmaderas.com',
            'password' => bcrypt('password'),
            'personal_phone' => '4421010101',
            'position' => 'ADMINISTRADOR',
            'area' => 'TI',
            'status_id' => Lookup::query()
                ->where('type', TypeLookup::STATUS_USER->value)
                ->where('name', 'Activo')
                ->first()
                ->id,
            'role_id' => Role::where('name', 'Administrador')->first()->id
        ]);
    }
}
