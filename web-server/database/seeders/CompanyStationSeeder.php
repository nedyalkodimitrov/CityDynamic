<?php

namespace Database\Seeders;

use App\Models\Station;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
                $station->companies()->attach($faker->numberBetween(1, 10));
            }
        }
    }
}
