<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Tag;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\NewsCategory;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public function indexxxxx()
    {
        $pages = Page::all();
        $news = News::all();
        return view('page.news.index', compact('news','pages'));
    }


    public function show(News $news)
    {

        $category = NewsCategory::all();
        Carbon::setLocale('pl');
        $dataCarbon = Carbon::createFromFormat('Y-m-d H:i:s', $news->date_publication);
        $news->date_publication = $dataCarbon->isoFormat('D MMMM YYYY HH:mm');
        $pages = Page::all();
        $tags = tag::withCount('news')->inRandomOrder()->limit(10)->get();

        return view('page.news.show', compact('news','tags','pages','category'));
    }

    public function list()
    {

        Carbon::setLocale('pl');
        $news = News::with(['photo' => function ($query) {
            $query->where('top', 1);
        },'category'])
        ->where('hidden', 0)
        ->orderBy('date_publication', 'asc')
        ->paginate(10);
        $category = NewsCategory::withCount('news')->get();

       // dd($news_category);
        // Przekształcenie daty publikacji dla każdego elementu w kolekcji

        $tags = tag::withCount('news')->inRandomOrder()->limit(10)->get();
        $news = $news->map(function ($item) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $item->date_publication);
        $item->date_publication = $date->isoFormat('D MMMM YYYY HH:mm');
        return $item;
        });


        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Ilość wyników na stronę
        $currentPageSearchResults = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        //$paginatedSearchResults = new LengthAwarePaginator($currentPageSearchResults, count($news), $perPage);
        $news = new LengthAwarePaginator($currentPageSearchResults, count($news), $perPage);
       // dd($news);

        //return view('news.news_list',compact(['news' => $paginatedSearchResults]));
        //return view('news.news_list',$news=>$paginatedSearchResults);

        return view('page.news.list', compact('news','category','tags'));
    }

    function category(Request $request)
     {

        $category = NewsCategory::withCount('news')->get();

        $category_id = request()->route()->parameter('category');

        Carbon::setLocale('pl');

        $news = News::with(['category','photo' => function ($query) {
            $query->where('top', 1);
        }])
        ->whereHas('category', function ($query) use ($category_id) {
            $query->where('news_category.id', $category_id);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

          // Przekształcenie daty publikacji dla każdego elementu w kolekcji
        $news = $news->map(function ($item) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $item->date_publication);
        $item->date_publication = $date->isoFormat('D MMMM YYYY HH:mm');
        return $item;
            });

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Ilość wyników na stronę
        $currentPageSearchResults = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $news = new LengthAwarePaginator($currentPageSearchResults, count($news), $perPage);

        return view('page.news.list', compact('news','category'));

    }

}
