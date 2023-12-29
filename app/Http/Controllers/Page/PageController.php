<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
 



    public function show(Request $request)
    {
        $link = request()->route()->parameter('page');

        //      DB::table('page')->where('link', 'like', "%$page%")->first(),
        //        $page = Page::findOrFail($request->id);

        /*   switch ($link)
           {
               case 'panel': $this->callAction('App\Http\Controllers\PanelController@index',['id'=>1]);
           }
    */
        $page = Page::where('link', 'like', "%$link%")->first();

        if (!$page) {
            return redirect()->route('404');
        }

        return view('page.subpage.show', compact('page'));
    }
}
