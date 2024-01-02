<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Page;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class PanelGalleryController extends Controller
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
        $categories = GalleryCategory::all();
        $galleries = Gallery::with('categories')->get();
        return view('galerie',compact('galleries','categories'));
    }
    public function list(GalleryCategory $category)
    {

        $pages = Page::all();
        if ($category->id == null) {
            $galleries = Gallery::with('categories')->get();
        } else {
            $galleries = Gallery::whereHas('categories', function ($query) use ($category)  {
                $query->where('gallery_category_id', $category->id);
            })->get();
        }


        return view('panel.gallery.list',compact('galleries','pages','category'));
    }

    public function add()
    {
        $categories = GalleryCategory::all();
        $pages = Page::all();
        $galleries = Gallery::all();
        return view('panel.gallery.add',compact('categories','galleries','pages'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $manager = new ImageManager(new Driver());
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $uniqueId = substr(md5(time().rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/storage/gallery');

                // Sprawdź, czy folder docelowy istnieje, a jeśli nie, utwórz go

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }


                // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

                $img = $manager->read($image->path());
                $img->scale(1920,1920)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'd.webp');

                $img = $manager->read($image->path());
                $img->scale(350,350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'm.webp');

                $img = $manager->read($image->path());
                $img->cover(350, 350)->toWebp(60)->save($destinationPath.'/'.$uniqueId. 'kw.webp');

                // Zapisywanie ścieżki do bazy danych
                $gallery = new Gallery();
                $gallery->gallery_category_id =$request->input('gallery_category_id');
                $gallery->name = $uniqueId;
                $gallery->user_id = Auth::id(); // Dodaj t
                $gallery->save();
            }
        }
        return redirect()->route('panel.gallery.list')->with('success', 'Zdjęcia wysłane poprawne');

    }

    public function destroy(Gallery $photo)
    {

        $photo = Gallery::find($photo->id);
        $photo_name = $photo->id.' ('.$photo->name.')';
        if ($photo) {

            if(File::exists('public/gallery/'.$photo->name.'kw.webp'))
            {
                File::delete('public/gallery/'.$photo->name.'kw.webp');
                File::delete('public/gallery/'.$photo->name.'d.webp');
                File::delete('public/gallery/'.$photo->name.'m.webp');
            }
            // Usuń informacje o zdjęciach z bazy danych
            $photo->delete();

            return redirect()->route('panel.gallery.list')->with('success', 'Zdjęcie '.$photo_name.' zostało usunięte');
        } else {
            return redirect()->route('panel.gallery.list')->with('error', 'Zdjęcie '.$photo_name.' nie zostało znalezione');
        }

    }

    public function category_list()
    {
        $pages = Page::all();
        //$galleries = Gallery::all();

        $categories = GalleryCategory::all();
        return view('panel.gallery.category_list',compact('categories','pages'));
    }

    public function category_destroy(GalleryCategory $category)
    {

        $category = GalleryCategory::find($category->id);
        $name = $category->name;
        $category->delete();

        return redirect()->route('panel.gallery.category_list')->with('success', 'kategoria '.$name.' zostało usunięte');


    }

    public function  category_create (Request $request,)
    {
        $pages = Page::all();
        $category = new GalleryCategory();
        $category->name = $request->name;
        $category->filtr = $request->filtr;
        $category->save();

        $categories = GalleryCategory::all();

        return view('panel.gallery.category_list',compact('categories','pages'));
    }

    public function category_edit(GalleryCategory $category)
    {
        $category = GalleryCategory::find($category->id);
        $pages = Page::all();
        $galleries = Gallery::all();
        $action = 'edit';
    return view('panel.gallery.category_form',compact('category','pages','action'));
    }

    public function category_add()
    {
        $category = new  GalleryCategory();
        $categories = GalleryCategory::all();
        $pages = Page::all();
        $galleries = Gallery::all();
        $action = 'create';
        return view('panel.gallery.category_form',compact('category','galleries','pages','action'));
    }

    public function category_update(Request $request, GalleryCategory $category)
    {

        $pages = Page::all();
        $category = GalleryCategory::find($category->id);
        $category->name = $request->name;
        $category->filtr = $request->filtr;
        $category->update();

        $categories = GalleryCategory::all();

        return view('panel.gallery.category_list',compact('categories','pages'));
    }

}
