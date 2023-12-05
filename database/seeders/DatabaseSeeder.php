<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // $this->call(ProductsTableSeeder::class);
        $this->call(ProductsCategorySeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductsTranslateTableSeeder::class);
        $this->call(ProductsPricesTableSeeder::class);
        $this->call(ProductsImagesSeeder::class);
        $this->call(ProductsAttributesSeeder::class);
        $this->call(OffersSeeder::class);
    }
}
