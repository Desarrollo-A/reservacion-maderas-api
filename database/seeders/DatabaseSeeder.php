<?php

namespace Database\Seeders;

use App\Models\Lookup;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Submenu;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Lookup::flushEventListeners();
        Role::flushEventListeners();
        User::flushEventListeners();
        Menu::flushEventListeners();
        Submenu::flushEventListeners();

        $this->call(LookupSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserAdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SubmenuSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
