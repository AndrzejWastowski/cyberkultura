<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;




class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            DB::table('products')->insert([
                'sku' => $faker->word,
                'price' => $faker->randomDigit,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}