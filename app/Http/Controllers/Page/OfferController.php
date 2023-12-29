<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Offer;
use App\Models\OfferComment;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use Illuminate\Support\Facades\DB;

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
        $path_m = '/resources/cyberkultura_reklama.webp';
        return view('page.offer.index', compact('offers','path_m'));
    }

 
    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {


            $offer = Offer::with(['comments' => function ($query) {
                $query->where('visibility', 1);
            }])
            ->withAvg(['comments'=> function ($query) {
                $query->where('visibility', 1);
            }], 'rating')
            ->findOrFail($offer->id);

            // Liczba komentarzy
            $commentsCount = $offer->comments->count();

            // Średnia ocena
            $averageRating = $offer->comments_avg_rating;

            $comments = OfferComment::select('rating', DB::raw('count(*) as total'))
                ->where('offers_id',$offer->id)
                ->where('visibility',1)
                ->groupBy('rating')
                ->orderBy('rating','desc')
                ->get();

           

                $totalComments = $comments->sum('total') ;
                $ratings = [];

                foreach ($comments as $comment) {
                    $ratings[$comment->rating] = ($comment->total / $totalComments) * 100;
                }

        return view('page.offer.show', compact('offer','commentsCount','averageRating','ratings'));
    }

}
