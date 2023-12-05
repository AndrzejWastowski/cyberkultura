<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $productId) {
            DB::table('products_images')->insert([
                'products_id' => $productId,
                'name' => $faker->title,
                'description' =>$faker->text,
                'top'  => $faker->randomFloat(0, 0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
