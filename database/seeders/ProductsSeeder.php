<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ProductsCategory;
use App\Models\Products;
use App\Models\ProductsCategoryTranslation;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($j = 1; $j <= 100; $j++) {
            $product = Products::create([
                'sku' => $faker->word,
                'price' => $faker->randomDigit,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Dodawanie losowych relacji między produktem a kategorią
            $categories = ProductsCategory::inRandomOrder()->limit(rand(2, 6))->pluck('id');

             $product->categories()->attach($categories);
        }
    }
}
