<?php

namespace Database\Seeders;

use App\Models\Enums\Lookups\InventoryTypeLookup;
use App\Models\Enums\Lookups\LevelMeetingLookup;
use App\Models\Enums\Lookups\ServicesListLookup;
use App\Models\Enums\Lookups\StatusRequestLookup;
use App\Models\Enums\Lookups\UnitTypeLookup;
use App\Models\Enums\TypeLookup;
use App\Models\Enums\Lookups\StatusUserLookup;
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
        StatusUserLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::STATUS_USER->value, 'name' => $lookup]));

        ServicesListLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::SERVICES_LIST->value, 'name' => $lookup]));

        StatusRequestLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::STATUS_REQUEST->value, 'name' => $lookup]));

        LevelMeetingLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::LEVEL_MEETING->value, 'name' => $lookup]));

        InventoryTypeLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::INVENTORY_TYPE->value, 'name' => $lookup]));

        UnitTypeLookup::getAll()
            ->each(fn ($lookup) => Lookup::create(['type' => TypeLookup::UNIT_TYPE->value, 'name' => $lookup]));

        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Activa']);
        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Baja']);
        Lookup::create(['type' => TypeLookup::STATUS_ROOM->value, 'name' => 'Mantenimiento']);
    }
}
