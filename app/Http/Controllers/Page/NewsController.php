<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{

    public function show(News $news)
    {
       
        dd($news);
        $category = NewsCategory::All();


        return view('page.news.show', compact('news','category'));

        
    }
    public function lists()
    {

        return view('page.subpages.show', compact('news'));
    }
}
