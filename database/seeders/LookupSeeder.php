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
        Lookup::create(['type' => TypeLookup::STATUS_USER->value, 'name' => 'Activo']);
        Lookup::create(['type' => TypeLookup::STATUS_USER->value, 'name' => 'Inactivo']);
        Lookup::create(['type' => TypeLookup::STATUS_USER->value, 'name' => 'Bloqueado']);

        Lookup::create(['type' => TypeLookup::SERVICES_LIST->value, 'name' => 'Sala de Juntas']);
        Lookup::create(['type' => TypeLookup::SERVICES_LIST->value, 'name' => 'Automóvil']);
        Lookup::create(['type' => TypeLookup::SERVICES_LIST->value, 'name' => 'Conductor']);

        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Nueva']);
        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Aprobada']);
        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Rechazada']);
        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Propuesta']);
        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Cancelada']);
        Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => 'Sin asistir']);

        Lookup::create(['type' => TypeLookup::LEVEL_MEETING->value, 'name' => 'Administrativa']);
        Lookup::create(['type' => TypeLookup::LEVEL_MEETING->value, 'name' => 'Directiva']);

        Lookup::create(['type' => TypeLookup::TYPE_SNACK->value, 'name' => 'Bebida']);
        Lookup::create(['type' => TypeLookup::TYPE_SNACK->value, 'name' => 'Snack']);
        Lookup::create(['type' => TypeLookup::TYPE_SNACK->value, 'name' => 'Bocadillo']);

        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Activa']);
        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Baja']);
        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Mantenimiento']);
    }
}
