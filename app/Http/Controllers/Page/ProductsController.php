<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Products;
use App\Models\ProductsCategory;
use App\Models\ProductsTranslation;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lists()
    {
        $perPage = 10; // liczba produktów na stronie
        $products = Products::with('images','pricing')->paginate($perPage);
        $productsCategory = ProductsCategory::with('translations_locale')->get();
        return view('page.products.lists', compact('products', 'productsCategory','perPage'));

    }


    /**
     * Display a listing of the resource.
     */
    public function category(ProductsCategory $category)
    {
        $perPage = 10; // liczba produktów na stronie 

        $products = Products::with(['images','translations_locale'])
        ->whereHas('categories', function ($query) use ($category) {
            $query->where('products_category_id', $category->id);
        })->paginate($perPage);

        $productsCategory = ProductsCategory::all();
        $category = ProductsCategory::findOrFail($category);


        return view('page.products.category', compact('products','perPage','productsCategory','category'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
         'name' => 'required',
         'description' => 'required',
    ]);

        // Tworzenie produktu
        $product = Products::create($validatedData);

        // Przekierowanie na odpowiednią stronę
        return redirect()->route('page.products.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {

        $product = Products::findOrFail($product->id);
        $category = ProductsCategory::findOrFail($product->categories->first()->id);
        return view('page.products.show', compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('page.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $product)
    {

        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Aktualizacja produktu
        $product->update($validatedData);

        // Przekierowanie na odpowiednią stronę
        return redirect()->route('products.show', $product->id);
    }


    public function delete(Products $products)
    {
        return view('products.delete', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        // Usunięcie produktu
        $products->delete();

        // Przekierowanie na odpowiednią stronę
        return redirect()->route('products.index');
    }
}
