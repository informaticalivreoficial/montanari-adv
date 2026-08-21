<?php

use Database\Seeders\ConfigTableSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConfigTableSeeder::class,
            RolesAndPermissionsSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
