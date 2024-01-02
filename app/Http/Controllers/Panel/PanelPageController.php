<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        return view('panel.pages.form',compact('page','action','pages'));
    }

    public function store_(Request $request)
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
        $destinationPath = public_path('/pages/images');

        // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

        // create an image manager instance with favored driver

        $manager = new ImageManager(new Driver());
        // read image from filesystem

        $img = $manager->read($request->file('image')->path());
        $img->scale(1920,1920)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'd.webp');

        $img = $manager->read($request->file('image')->path());
        $img->scale(350,350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'm.webp');

        $img = $manager->read($request->file('image')->path());
        $img->cover(350, 350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'kw.webp');

        $page = new Page();
        $page->title = $validatedData['title'];
        $page->link = $validatedData['link'];
        $page->lead = $validatedData['lead'];
        $page->description = $validatedData['description'];
        $page->image = $uniqueId;
        $page->save();

        return redirect()->route('page.subpage')->with('success', 'Page created successfully');
    }

    public function edit($page)
    {
        $pages = Page::all();
        $page = Page::findOrFail($page);
        $action = "edit";
        return view('panel.pages.form',compact('page','action','pages'));
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
        $destinationPath = public_path('/pages/images');

        // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

        $manager = new ImageManager(new Driver());

        $img = $manager->read($request->file('image')->path());
        $img->scale(1920,1920)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'd.webp');

        $img = $manager->read($request->file('image')->path());
        $img->scale(350,350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'm.webp');

        $img = $manager->read($request->file('image')->path());
        $img->cover(350, 350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'kw.webp');

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
