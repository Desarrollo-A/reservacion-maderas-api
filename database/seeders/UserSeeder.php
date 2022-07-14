<?php

namespace Database\Seeders;

use App\Models\Enums\TypeLookup;
use App\Models\Lookup;
use App\Models\Office;
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
        $admin = Role::query()->where('name', 'Recepción')->first()->id;
        $reception = Role::query()->where('name', 'Solicitante')->first()->id;
        $officeId = Office::all(['id']);
        $activeStatus = Lookup::query()
            ->where('type', TypeLookup::STATUS_USER->value)
            ->where('name', 'Activo')
            ->first()
            ->id;

        User::factory()
            ->create([
                'role_id' => $admin,
                'status_id' => $activeStatus,
                'office_id' => $officeId->random()
            ]);
        User::factory()
            ->create([
                'role_id' => $admin,
                'status_id' => $activeStatus,
                'office_id' => $officeId->random()
            ]);
        User::factory()
            ->create([
                'role_id' => $admin,
                'status_id' => $activeStatus,
                'office_id' => $officeId->random()
            ]);

        User::factory()
            ->times(10)
            ->create(['role_id' => $reception, 'status_id' => $activeStatus]);
    }
}
