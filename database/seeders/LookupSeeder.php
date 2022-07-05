<?php

namespace Database\Seeders;

use App\Models\Enums\TypeLookup;
use App\Models\Lookup;
use Illuminate\Database\Seeder;

class LookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lookup::create(['type' => TypeLookup::StatusUser->value, 'name' => 'Activo']);
        Lookup::create(['type' => TypeLookup::StatusUser->value, 'name' => 'Inactivo']);
        Lookup::create(['type' => TypeLookup::StatusUser->value, 'name' => 'Bloqueado']);
    }
}
