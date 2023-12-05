<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\ProductsAttributes;
use App\Models\Products;


class ProductsAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $faker = Faker::create('pl_PL'); // Polski
        $products = Products::limit(100)->get();

        foreach ($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                $attribute = new ProductsAttributes();
                $attribute->products_id = $product->id;
                $attribute->attribute_name = $faker->text(15);
                $attribute->attribute_value = $faker->randomNumber();
                $attribute->save();
            }
        }
    }
}