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
        $reception = Role::query()->where('name', 'Recepción')->first()->id;
        $solicitante = Role::query()->where('name', 'Solicitante')->first()->id;
        $officeId = Office::all(['id']);
        $activeStatus = Lookup::query()
            ->where('type', TypeLookup::STATUS_USER->value)
            ->where('name', 'Activo')
            ->first()
            ->id;

        for($i = 0; $i < 3; $i++) {
            User::factory()
                ->create([
                    'role_id' => $reception,
                    'status_id' => $activeStatus,
                    'office_id' => $officeId->random()]);
        }

        for($i = 0; $i < 15; $i++) {
            User::factory()
                ->create([
                    'role_id' => $solicitante,
                    'status_id' => $activeStatus,
                    'office_id' => $officeId->random()]);
        }
    }
}
