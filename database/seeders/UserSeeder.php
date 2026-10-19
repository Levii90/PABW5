<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
$faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Demo',
                'password' => Hash::make('admin123'),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

    }
}