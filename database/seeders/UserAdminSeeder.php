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
            'full_name' => 'Administrador TI',
            'email' => 'admin@ciudadmaderas.com',
            'password' => bcrypt('password'),
            'personal_phone' => '4421010101',
            'position' => 'Administrador',
            'area' => 'TI',
            'status_id' => $activeStatus = Lookup::query()
                ->where('type', TypeLookup::StatusUser->value)
                ->where('name', 'Activo')
                ->first()
                ->id,
            'role_id' => Role::where('name', 'Administrador')->first()->id
        ]);
    }
}
