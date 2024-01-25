<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $users[$i] = [
                'group_id' => rand(1, 2),
                'country_id' => rand(1, 3),
                'status' => rand(0, 1),
                'trash' => rand(0, 1),
                'fullname' => $faker->name(),
                'email' => $faker->email(),
                'created_at' => $faker->dateTimeBetween('-2 months')
            ];
        }

        DB::table('users')->insert($users);
    }
}
