<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $productId) {
            DB::table('products_prices')->insert([
                'products_id' => $productId,
                'min_quantity' => $faker->randomFloat(2, 0, 100),
                'max_quantity' => $faker->randomFloat(2, 0, 100),
                'price_per_unit'  => $faker->randomFloat(2, 0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
