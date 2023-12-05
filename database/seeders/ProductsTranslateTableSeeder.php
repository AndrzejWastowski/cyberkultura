<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTranslateTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pl_PL');

        $locales = ['pl', 'en',]; // Lista dostępnych języków

        foreach (range(1, 100) as $productId) {
            foreach ($locales as $locale) {
                DB::table('products_translations')->insert([
                    'products_id' => $productId,
                    'locale' => $locale,
                    'name' => $faker->word,
                    'description' => $faker->sentence(25),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}