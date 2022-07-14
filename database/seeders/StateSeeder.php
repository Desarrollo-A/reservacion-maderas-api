<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name' => 'QRO']);
        State::create(['name' => 'LEON']);
        State::create(['name' => 'SLP']);
        State::create(['name' => 'CDMX']);
        State::create(['name' => 'MERIDA']);
        State::create(['name' => 'CELAYA']);
        State::create(['name' => 'CANCUN']);
        State::create(['name' => 'GDL']);
        State::create(['name' => 'TIJUANA']);
        State::create(['name' => 'SAN MIGUEL DE ALLENDE']);
    }
}
