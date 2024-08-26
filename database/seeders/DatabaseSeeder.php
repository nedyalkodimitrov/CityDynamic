<?php

namespace Database\Seeders;

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
            CountrySeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            CompanySeeder::class,
            StationSeeder::class,
            UserSeeder::class,
            BusSeeder::class,
            CompanyStationSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
    }
}
