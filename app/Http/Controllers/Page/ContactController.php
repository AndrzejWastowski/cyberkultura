<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('page.kontakt');
    }
}
