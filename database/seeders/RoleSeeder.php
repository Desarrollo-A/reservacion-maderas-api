<?php

namespace Database\Seeders;

use App\Models\Enums\NameRole;
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
            'name' => NameRole::ADMIN->value,
            'status' => true
        ]);
        Role::create([
            'name' => NameRole::RECEPCIONIST->value,
            'status' => true
        ]);
        Role::create([
            'name' => NameRole::APPLICANT->value,
            'status' => true
        ]);
    }
}
