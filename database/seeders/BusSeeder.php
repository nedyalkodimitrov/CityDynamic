<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //Create busses for each company
        foreach (range(1, 10) as $index) {
            foreach (range(1, 10) as $busIndex) {
                 Bus::create([
                    'company' => $index,
                    'name' => $faker->name,
                    'model' => $faker->name,
                    'seats' => $faker->numberBetween(10, 50),
                    'seatsAtRow' => $faker->numberBetween(2, 5),
                    'seatsStatus' => json_encode([]),
                ]);
            }
        }
    }
}
