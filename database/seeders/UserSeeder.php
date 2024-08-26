<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

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
        $adminRoleId = Role::where('name', 'System Admin')->value('id');
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@dynamic-city.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
        ]);
        $admin->assignRole($adminRoleId);

        //Create company admin accounts
        foreach (range(1, 10) as $index) {
            $companyRoleId = Role::where('name', 'Company Admin')->value('id');

            $companyUser = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);

            $companyUser->assignRole($companyRoleId);
            $companyUser->getCompanyEmployers()->attach($index);
        }

        //Create station admin accounts
        foreach (range(1, 10) as $index) {
            $stationRoleId = Role::where('name', 'Station Admin')->value('id');

            $companyUser = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]);

            $companyUser->assignRole($stationRoleId);
        }
    }
}
