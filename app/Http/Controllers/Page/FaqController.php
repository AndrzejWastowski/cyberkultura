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

        return view('page.faq.show', compact('faq'));
    }
    public function lists()
    {
        $faqs = Faq::all();
     

        return view('page.faq.list', compact('faqs'));
    }
}
