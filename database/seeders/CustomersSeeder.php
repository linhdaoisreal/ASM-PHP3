<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $customers = [];

        for ($i = 1; $i <= 10; $i++) {
            $customers[] = [
                'name' => $faker->name,
                'password' => $this->generateRandomPassword(20),
                'email' => $faker->unique()->safeEmail,
                'randomKey' => $faker->uuid,
                'status' => $faker->boolean,
                'idGroup' => rand(0, 1), // Giả định có 2 nhóm (0 hoặc 1)
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('customers')->insert($customers);
    }

    private function generateRandomPassword($length = 20)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
