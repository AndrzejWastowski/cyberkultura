<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Offer;

use App\Models\Products;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $productsCategory = Products::join('products_category_translations', 'products_category.id', '=', 'products_category_translations.products_id')
        ->where('products_category_translations.locale', 'pl')
        ->orderBy('products_category_translations.name') // Sortuj według nazwy w tłumaczeniu
        ->get();

        $offers = Offer::join('offers_translations', 'offers.id', '=', 'offers_translations.offers_id')
        ->where('offers_translations.locale', 'pl')
        ->orderBy('offers_translations.name') // Sortuj według nazwy w tłumaczeniu
        ->get();

        //$offer = Offer::with(['translations' => function($query) {
        //    $query->where('offers_translations.locale', 'pl');
        //}])->find($offer->id);



        return view('page.home',compact('productsCategory'));
    }
}
