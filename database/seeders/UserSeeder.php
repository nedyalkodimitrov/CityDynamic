<?php

namespace Database\Seeders;

use App\Http\Constants\RoleConstant;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //Create admin account
        $adminRoleId = Role::where('name', RoleConstant::SYSTEM_ADMIN)->value('id');
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@dynamic-city.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);
        $admin->assignRole($adminRoleId);

        //Create company admin accounts
        $companyRoleId = Role::where('name', RoleConstant::COMPANY_ADMIN)->value('id');
        foreach (range(1, 10) as $index) {

            $companyUser = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);

            $companyUser->assignRole($companyRoleId);
            $companyUser->userWorkspace()->create([
                'company_id' => $index,
            ]);
        }

        //Create station admin accounts
        $stationRoleId = Role::where('name', RoleConstant::STATION_ADMIN)->value('id');
        foreach (range(1, 10) as $index) {

            $companyUser = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);

            $companyUser->assignRole($stationRoleId);

            $companyUser->userWorkspace()->create([
                'station_id' => $index,
            ]);
        }
    }
}
