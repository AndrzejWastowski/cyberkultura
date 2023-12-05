<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\ProductsCategory;
use App\Models\Products;
use App\Models\ProductsCategoryTranslation;

class ProductsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoriesPl = [
            'Wizytówki',
            'Zaproszenia',
            'Ulotki',
            'Kubki',
            'Pendrive',
            'Smycze',
            'Breloczki',
            'Puzzle',
            'Medale',
            'Tabliczki okolicznościowe',
            'Dyplomy',
            'Puchary',
            // Dodaj więcej kategorii, jeśli potrzebujesz
        ];

         // Kategorie w języku angielskim
         $categoriesEn = [
            'Business Cards',
            'Invitations',
            'Flyers',
            'Mugs',
            'USB Drives',
            'Lanyards',
            'Keychains',
            'Puzzles',
            'Medals',
            'Commemorative Plaques',
            'Diplomas',
            'Cups',
            // Dodaj więcej tłumaczeń, jeśli potrzebujesz
        ];


        for ($i = 0; $i < count($categoriesPl); $i++) {
            $category = ProductsCategory::create();
            // Tłumaczenie w języku polskim
            ProductsCategoryTranslation::create([
                'products_category_id' => $category->id,
                'locale' => 'pl',
                'name' => $categoriesPl[$i],
            ]);

            // Tłumaczenie w języku angielskim
            ProductsCategoryTranslation::create([
                'products_category_id' => $category->id,
                'locale' => 'en',
                'name' => $categoriesEn[$i],
            ]);
        }
    }
}