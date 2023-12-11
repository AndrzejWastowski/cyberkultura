<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\News;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{

    public function show(News $news)
    {

        return view('page.subpages.show', compact('news'));
    }
    
    public function lists()
    {

        return view('page.subpages.show', compact('news'));
    }
}
