<?php
namespace App\Http\Controllers\Panel;


use App\Http\Controllers\Controller;
use App\Models\Calendary;
use App\Models\CalendarySubevents;
use App\Models\CalendaryPhoto;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Localization;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class PanelCalendaryController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('pl');
    }


    public function list()
    {
        $calendary = Calendary::with('category')
        ->orderBy('date', 'asc')
        ->get();

        $pages = Page::all();
        return view('panel.calendary.list', compact('calendary','pages'));
    }

    public function add()
    {
        $dataCarbon = Carbon::now();

        $pages = Page::all();
        $calendary = new Calendary();
        $calendary->id=0;
        //Rozdziel wartość na datę i czas
        $calendary->date = Carbon::now()->format('Y-m-d H:i');
        $pages = Page::all();
        $category = Category::all();      
        $organizations = Organization::where('hidden', 0)->orderBy('name', 'asc')->get();
        $localizations = Localization::where('hidden', 0)->orderBy('name', 'asc')->get();
        $action = 'create';
        $category = Category::all();

        return view('panel.calendary.form', compact('calendary','category','organizations','localizations','action','pages'));
    }


    public function edit(Calendary $calendary)
    {

        $calendary = Calendary::with(['category',
        'photo' => function ($query) {
            $query->orderBy('sort', 'asc');},
        'subevents'  => function ($query) {
            $query->orderBy('date', 'asc');
        }])->findOrFail($calendary->id);



        $pages = Page::all();
        $category = Category::all();     
        $organizations = Organization::where('hidden', 0)->orderBy('name', 'asc')->get();
        $localizations = Localization::where('hidden', 0)->orderBy('name', 'asc')->get();
        $action = 'edit';
        //$localizationOptions = NewsPhoto::getEnumValues('localization');


        return view('panel.calendary.form', compact('calendary','category','organizations','localizations','action','pages'));
    }


    public function create(Request $request)
    {

        $messages = [
            'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'lead' => 'Pole ":attribute jest wymagane',
            'localizations_id' => 'Pole ":attribute jest wymagane',
            'organizations_id' => 'Pole ":attribute jest wymagane',
            'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
            'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
            'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
            'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
            'age.numeric' => 'Pole ":attribute" musi być liczbą.',
];
            $validatedData = $request->validate([
            'title' => 'required',
            'lead' => 'required',
            'description' => 'nullable',
            'date' => 'required',
            'category_id' => 'required',
            'localizations_id' => 'required',
            'organizations_id' => 'required',
            'hidden' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'age' => 'numeric',
            'price' => 'numeric',
            'link' => 'nullable',
            'subevents.*' => 'nullable',
        ], $messages);


        if (!isset($validatedData['hidden'])) $validatedData['hidden'] = false; else $validatedData['hidden'] = true;
        if (!isset($validatedData['children'])) $validatedData['children'] = false; else $validatedData['children'] = true;

        $calendary = new Calendary();
        $calendary->title = $validatedData['title'];
        $calendary->lead = $validatedData['lead'];
        $calendary->description = $validatedData['description'];
        $calendary->date = $validatedData['date'];
        $calendary->localizations_id = $validatedData['localizations_id'];
        $calendary->organizations_id = $validatedData['organizations_id'];
        $calendary->category_id = $validatedData['category_id'];
        $calendary->hidden = $validatedData['hidden'];
        $calendary->children = $validatedData['children'];
        $calendary->link = $validatedData['link'];
        $calendary->age = $validatedData['age'];
        $calendary->users_id = Auth::id();
        $calendary->save();

        // Dodaj podwydarzenia (jeśli są)
        if (isset($validatedData['subevents']))
            {
                foreach ($validatedData['subevents'] as $subevent) {

                    if (!isset($subevent['description'])) $subevent['description']='';
                    if (!isset($subevent['children'])) $subevent['children']=false;
                    if (!isset($subevent['age'])) $subevent['age']=0;

                    $se = new CalendarySubevents;
                    $se->name = $subevent['title'];
                    $se->date = $subevent['date'];
                    $se->description = $subevent['description'];
                    $se->price = $subevent['price'];
                    $se->children = $subevent['children'];
                    $se->age = $subevent['age'];
                    $se->category_id = $subevent['category_id'];
                    $se->calendary_id = $calendary->id;  // Ustal klucz obcy dla głównego wydarzenia
                    $se->save();
                }
            }

        $pom=0;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {

                $pom++;
                $uniqueId = substr(md5(time().rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/calendary/'.$calendary->id.'/gallery');


                // Sprawdź, czy folder docelowy istnieje, a jeśli nie, utwórz go


                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

                $img = Image::make($image->path());
                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'm.webp');

                $img = Image::make($image->path());
                $img->fit(350, 350)->encode('webp')->save($destinationPath.'/'.$uniqueId. 'kw.webp');

                $img = Image::make($image->path());
                $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'd.webp');

                // Zapisywanie ścieżki do bazy danych
                $photo = new CalendaryPhoto();
                $photo->news_id = $calendary->id;
                $photo->name = $uniqueId;
                $photo->sort = $pom;
                $photo->top = 0;
                $photo->description = "";
                $photo->user_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.calendary.list')
            ->with('success', 'Wiadomość została utworzona.');
    }

    public function update(Request $request, Calendary $calendary)
    {
  //dd($request);
  $messages = [
    'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
    'lead' => 'Pole ":attribute jest wymagane',
    'localizations_id' => 'Pole ":attribute jest wymagane',
    'organizations_id' => 'Pole ":attribute jest wymagane',
    'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
    'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
    'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
    'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
    'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
    'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
    'age.numeric' => 'Pole ":attribute" musi być liczbą.',
];
    $validatedData = $request->validate([
    'title' => 'required',
    'lead' => 'required',
    'description' => 'nullable',
    'date' => 'required',
    'category_id' => 'required',
    'localizations_id' => 'required',
    'organizations_id' => 'required',
    'hidden' => 'nullable',
    'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
    'age' => 'numeric',
    'price' => 'numeric',
    'link' => 'nullable',
    'subevents.*' => 'nullable',
], $messages);


        $calendary->update($validatedData);

if (isset($validatedData['subevents'])) {

    foreach ($validatedData['subevents'] as $subevent) {

        if (!isset($subevent['description'])) {
            $subevent['description'] = '';
        }
        if (!isset($subevent['children'])) {
            $subevent['children'] = false;
        }
        if (!isset($subevent['age'])) {
            $subevent['age'] = 0;
        }
        if (!isset($subevent['hidden'])) {
            $subevent['hidden'] = 0;
        }
        if (!isset($subevent['link'])) {
            $subevent['link'] = 0;
        }

        $se = new CalendarySubevents();
        $se->title = $subevent['title'];
        $se->date = $subevent['date'];
        $se->description = $subevent['description'];
        $se->link = $subevent['link'];
        $se->price = $subevent['price'];
        $se->hidden = $subevent['hidden'];
        $se->children = $subevent['children'];
        $se->age = $subevent['age'];
        $se->calendary_id = $calendary->id;  // Ustal klucz obcy dla głównego wydarzenia
        $se->save();
    }
}

        $pom = CalendaryPhoto::where('calendary_id', $calendary->id)->count();

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $pom++;
                $uniqueId = substr(md5(time().rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/calendary/'.$calendary->id.'/gallery');


                // Sprawdź, czy folder docelowy istnieje, a jeśli nie, utwórz go


                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)

                $img = Image::make($image->path());
                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'm.webp');

                $img = Image::make($image->path());
                $img->fit(350, 350)->encode('webp')->save($destinationPath.'/'.$uniqueId. 'kw.webp');

                $img = Image::make($image->path());
                $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp')->save($destinationPath.'/'.$uniqueId. 'd.webp');

                // Zapisywanie ścieżki do bazy danych
                $photo = new CalendaryPhoto();
                $photo->news_id = $calendary->id;
                $photo->name = $uniqueId;
                $photo->description = "";
                $photo->top = 0;
                $photo->sort = $pom;
                $photo->user_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.calendary.list')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(Calendary $item)
    {
       // dd($news);
       $photos = $item->photo;

    // Usuń każde zdjęcie fizycznie ze serwera
foreach ($photos as $photo) {


        if(Storage::exists('/calendary/'.$photo->calendary_id.'/gallery/'.$photo->name.'kw.webp')) {
            Storage::delete('/calendary/'.$photo->calendary_id.'/gallery/'.$photo->name.'kw.webp');
            Storage::delete('/calendary/'.$photo->calendary_id.'/gallery/'.$photo->name.'d.webp');
            Storage::delete('/calendary/'.$photo->calendary_id.'/gallery/'.$photo->name.'m.webp');

    }
}

        // Usuń wszystkie zdjęcia powiązane z tym news-em
        $item->photo()->delete(); // zakładając, że relacja w modelu News do zdjęć nazywa się "photos"

        $item->delete();

        return redirect()->route('panel.news.list')
            ->with('success', 'News deleted successfully.');
    }


    public function editPhotos(Request $request)
    {

        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'photo_id' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = CalendaryPhoto::find($request->photo_id);

        if ($request->top==null) {
            $top=0;
        } else  {
            CalendaryPhoto::where('calendary_id', $request->calendary_id)->update(['top' => 0]);
            $top=1;
        }



        $photo->description = $request->description;
        $photo->top = $top;
        $photo->localization = $request->localization;
        $photo->update();

        $url = route('panel.calendary.edit',$request->news_id).'#photo_'.$photo->id;

       return redirect($url)->with('success', 'Zdjęcie '.$request->photo_id.' zostało usunięte');

    }

    public function destroyPhotos(CalendaryPhoto $photo)
    {

        $photo = CalendaryPhoto::find($photo->id);
        $calendary_id = $photo->calendary_id;
        $photo_name = $photo->id.' ('.$photo->name.')';
        if ($photo) {

            if(Storage::exists('/news/'.$photo->calendary_id.'/gallery/'.$photo->name.'kw.webp'))
            {
                Storage::delete('/news/'.$photo->calendary_id.'/gallery/'.$photo->name.'kw.webp');
                Storage::delete('/news/'.$photo->calendary_id.'/gallery/'.$photo->name.'d.webp');
                Storage::delete('/news/'.$photo->calendary_id.'/gallery/'.$photo->name.'m.webp');
            }
            // Usuń informacje o zdjęciach z bazy danych
            $photo->delete();

            $url = route('panel.news.edit',$calendary_id).'#photo_list';


            return redirect($url)->with('success', 'Zdjęcie '.$photo_name.' zostało usunięte');
        } else {
            $url = route('panel.news.edit',$calendary_id).'#photo_'.$photo->id;

            return redirect($url)->with('error', 'Zdjęcie '.$photo_name.' nie zostało znalezione');
        }

    }


 public function changeOrderPhoto(Request $request, $id)
    {
        $photo = CalendaryPhoto::findOrFail($id);
        $currentSort = $photo->sort;

        if ($request->input('action') === 'up') {
            $swapWith = CalendaryPhoto::where('sort', '<', $currentSort)
                                ->orderBy('sort', 'desc')
                                ->first();
        } else {
            $swapWith = CalendaryPhoto::where('sort', '>', $currentSort)
                                ->orderBy('sort', 'asc')
                                ->first();
        }

        if ($swapWith) {
            // Zamiana sort pozycji
            $tempSort = $photo->sort;
            $photo->sort = $swapWith->sort;
            $swapWith->sort = $tempSort;

            // Zapisanie zmian do bazy danych
            $photo->save();
            $swapWith->save();
        }

       // return redirect()->back();

        $url = route('panel.news.edit',$photo->news_id).'#photo_'.$photo->id;

        return redirect($url)->with('success', 'Zdjęcie '.$photo->name.' przesunięte');


    }


    private function set_top($photo_id)
    {

    }

    public function getSubcategories(Category $category)
{
    return $category->subcategories; // Zakładam, że masz relację o nazwie "subcategories" w modelu Category
}


}
