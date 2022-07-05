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
        
        Lookup::create(['type' => TypeLookup::ServicesList->value, 'name' => 'Sala de Juntas']);
        Lookup::create(['type' => TypeLookup::ServicesList->value, 'name' => 'Automóvil']);
        Lookup::create(['type' => TypeLookup::ServicesList->value, 'name' => 'Conductor']);

        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Nueva']);
        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Aprobada']);
        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Rechazada']);
        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Propuesta']);
        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Cancelada']);
        Lookup::create(['type' => TypeLookup::StatusRequest->value, 'name' => 'Sin asistir']);

        Lookup::create(['type' => TypeLookup::LevelMeeting->value, 'name' => 'Administrativa']);
        Lookup::create(['type' => TypeLookup::LevelMeeting->value, 'name' => 'Directiva']);

        Lookup::create(['type' => TypeLookup::TypeSnack->value, 'name' => 'Bebida']);
        Lookup::create(['type' => TypeLookup::TypeSnack->value, 'name' => 'Snack']);
        Lookup::create(['type' => TypeLookup::TypeSnack->value, 'name' => 'Bocadillo']);

    }
}
