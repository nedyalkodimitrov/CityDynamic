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
            ['name' => 'Sofia', 'country' => 1],
            ['name' => 'Plovdiv', 'country' => 1],
            ['name' => 'Varna', 'country' => 1],
            ['name' => 'Burgas', 'country' => 1],
            ['name' => 'Ruse', 'country' => 1],
            ['name' => 'Stara Zagora', 'country' => 1],
            ['name' => 'Pleven', 'country' => 1],
            ['name' => 'Sliven', 'country' => 1],
            ['name' => 'Dobrich', 'country' => 1],
            ['name' => 'Shumen', 'country' => 1],
        ];

        DB::table('cities')->insert($cities);
    }
}
