<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Faq;
use Intervention\Image\Facades\Image;

class FaqController extends Controller
{

    public function show(Faq $faq)
    {

        return view('page.subpages.show', compact('news'));
    }
    public function lists()
    {

        return view('page.subpages.show', compact('news'));
    }
}
