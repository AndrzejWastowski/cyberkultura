<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\ProductsCategoryTranslation;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class ProductsCategoryController extends Controller
{

    public function index()
    {
        $categories = ProductsCategory::with('translations')->get();

        return view('productsCategories.index', compact('categories'));
    }


    public function create()
    {
        return view('productsCategories.create');
    }

    public function store(Request $request)
    {
        $category = new ProductsCategory();
        $category->save();

        foreach ($request->languages as $locale => $name) {
            $translation = new ProductsCategoryTranslation();
            $translation->products_category_id = $category->id;
            $translation->locale = $locale;
            $translation->name = $name;
            $translation->save();
        }

        return redirect()->route('productsCategories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = ProductsCategory::findOrFail($id);
        return view('productsCategories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Walidacja danych wejściowych

        $category = ProductsCategory::findOrFail($id);
        $category->update($request->all());

        // Przekierowanie po aktualizacji kategorii
    }

    public function destroy($id)
    {
        $category = ProductsCategory::findOrFail($id);
        $category->delete();

        // Przekierowanie po usunięciu kategorii
    }
}
