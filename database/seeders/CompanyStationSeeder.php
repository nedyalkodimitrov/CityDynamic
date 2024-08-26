<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class CompanyStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $station = Station::find($index);

            foreach (range(1, 3) as $secondIndex) {
                $station->getCompanies()->attach($faker->numberBetween(1, 10));
            }
        }
    }
}
