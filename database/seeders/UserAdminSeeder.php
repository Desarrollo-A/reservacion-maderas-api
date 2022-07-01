<?php

namespace Database\Seeders;

use App\Models\Enums\StatusUser;
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
            'status' => StatusUser::Active->value,
            'role_id' => Role::where('name', 'Administrador')->first()->id
        ]);
    }
}
