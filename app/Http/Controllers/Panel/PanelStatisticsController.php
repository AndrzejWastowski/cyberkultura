<?php
namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;

class PanelStatisticsController extends Controller
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

    public function show()
    {
        $pages = Page::all();
        return view('panel.statistics.show',compact('pages'));
    }


}
