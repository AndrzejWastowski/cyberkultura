<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PanelPageController extends Controller
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
    public function index()
    {
        $pages = Page::all();
        return view('panel.pages.index', compact('pages'));
    }



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

        return view('show', compact('page'));
    }

    public function create()
    {
        $pages = Page::all();
        $page = new Page();
        $action = "create";
        return view('panel.pages.form_pages',compact('page','action','pages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uniqueId = substr(md5(time().rand()), 0, 8);
        // Tworzenie unikalnej nazwy dla obrazu
        // Miejsce docelowe
        $destinationPath = public_path('/storage/pages/images');

        // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

        $img = Image::make($request->file('images')->path());
        $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'm.webp');

        $img = Image::make($request->file('images')->path());
        $img->fit(350, 350)->encode('webp')->save($destinationPath.'/'.$uniqueId. 'kw.webp');

        $img = Image::make($$request->file('images')->path());
        $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
        })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'd.webp');

        $page = new Page();
        $page->title = $validatedData['title'];
        $page->link = $validatedData['link'];
        $page->lead = $validatedData['lead'];
        $page->description = $validatedData['description'];
        $page->image = $uniqueId;
        $page->save();

        return redirect()->route('page.pages.index')->with('success', 'Page created successfully');
    }

    public function edit($page)
    {
        $pages = Page::all();
        $page = Page::findOrFail($page);
        $action = "edit";
        return view('panel.pages.form_pages',compact('page','action','pages'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $page = Page::findOrFail($id);
        $page->title = $validatedData['title'];
        $page->link = $validatedData['link'];
        $page->lead = $validatedData['lead'];
        $page->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $uniqueId = substr(md5(time().rand()), 0, 8);
        // Tworzenie unikalnej nazwy dla obrazu
        // Miejsce docelowe
        $destinationPath = public_path('/storage/pages/images');

        // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

        $img = Image::make($request->file('images')->path());
        $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'm.webp');

        $img = Image::make($request->file('images')->path());
        $img->fit(350, 350)->encode('webp')->save($destinationPath.'/'.$uniqueId. 'kw.webp');

        $img = Image::make($$request->file('images')->path());
        $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
        })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'd.webp');

        $page->image = $uniqueId;
        }

        $page->update();


        return redirect()->route('panel.pages.edit',$page)->with('success', 'Page updated successfully');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('panel.pages.index')->with('success', 'Page deleted successfully');
    }
}
