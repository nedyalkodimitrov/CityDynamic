<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'System Admin', 'guard_name' => 'web'],
            ['name' => 'Company Admin', 'guard_name' => 'web'],
            ['name' => 'Station Admin', 'guard_name' => 'web'],
            ['name' => 'Bus Driver', 'guard_name' => 'web'],
        ];

        DB::table('roles')->insert($cities);
    }
}
