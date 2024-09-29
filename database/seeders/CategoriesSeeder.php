<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = [];

        for ($i = 1; $i <= 10; $i++) {
            $categories[] = [
                'category_name' => $faker->unique()->word,
                'ordinal' => $i,
                'status' => $faker->boolean,
                'img_cate' => 'https://picsum.photos/200/200?random=' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
