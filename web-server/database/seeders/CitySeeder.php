<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Sofia', 'country_id' => 1],
            ['name' => 'Plovdiv', 'country_id' => 1],
            ['name' => 'Varna', 'country_id' => 1],
            ['name' => 'Burgas', 'country_id' => 1],
            ['name' => 'Ruse', 'country_id' => 1],
            ['name' => 'Stara Zagora', 'country_id' => 1],
            ['name' => 'Pleven', 'country_id' => 1],
            ['name' => 'Sliven', 'country_id' => 1],
            ['name' => 'Dobrich', 'country_id' => 1],
            ['name' => 'Shumen', 'country_id' => 1],
        ];

        DB::table('cities')->insert($cities);
    }
}
