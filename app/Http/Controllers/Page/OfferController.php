<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $offers = Offer::with(['translations' => function($query) {
            $query->where('locale', 'pl');
        }])->get();;

        return view('page.offer.index', compact('offers'));
    }

 
    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {

        $offers = Offer::join('offers_translations', 'offers.id', '=', 'offers_translations.offers_id')
            ->where('offers_translations.locale', 'pl')
            ->orderBy('offers_translations.name') // Sortuj według nazwy w tłumaczeniu
            ->get();

            $offer = Offer::with(['translations' => function($query) {
                $query->where('offers_translations.locale', 'pl');
            }])->find($offer->id);


        return view('page.offer.show', compact('offer','offers'));
    }

}
