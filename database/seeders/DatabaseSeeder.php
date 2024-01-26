<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(UserSeeder::class);
        //$this->call(GroupSeeder::class);

        DB::table('doctors')->insert([
            'name' => 'Dinomanh',
            'email' => 'manhnguyen@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
