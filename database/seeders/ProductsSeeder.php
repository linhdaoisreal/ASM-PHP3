<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $products = [];

        for ($i = 1; $i <= 100; $i++) {
            $products[] = [
                'cate_id' => rand(1, 10), 
                'product_name' => $faker->unique()->word,
                'description' => $faker->sentence(10),
                'price' => $faker->randomFloat(2, 10, 1000),
                'sale_price' => $faker->randomFloat(2, 5, 900), // Giá bán có thể thấp hơn giá gốc
                'img_cover' => 'https://picsum.photos/200/200?random=' . $i, // Ảnh ngẫu nhiên
                'quantity' => $faker->numberBetween(0, 100),
                'hot_product' => $faker->boolean,
                'status' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
