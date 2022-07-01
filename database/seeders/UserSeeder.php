<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'Recepción')->first()->id;
        $reception = Role::where('name', 'Solicitante')->first()->id;

        User::factory()
            ->times(10)
            ->create(['role_id' => $admin]);

        User::factory()
            ->times(50)
            ->create(['role_id' => $reception]);
    }
}
