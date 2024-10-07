<?php

namespace Database\Seeders;

use App\Models\Bus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
                    'company_id' => $index,
                    'name' => $faker->name,
                    'model' => $faker->name,
                    'seats' => $faker->numberBetween(10, 50),
                    'seats_at_row' => $faker->numberBetween(2, 5),
                    'seats_status' => json_encode([]),
                    'location' => $faker->address,
                ]);
            }
        }
    }
}
