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
        $faqs = ['question'=>'Co i jak?','answer'=>'na bok a czasem na wspak'];
        return view('page.faq.list', compact('faqs'));
    }
}
