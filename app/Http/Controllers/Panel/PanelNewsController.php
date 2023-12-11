<?php
namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\NewsCategory;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PanelNewsController extends Controller
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

    public function show(News $news)
    {

        $dataCarbon = Carbon::createFromFormat('Y-m-d H:i:s', $news->date_publication);
        $news->date_publication = $dataCarbon->isoFormat('D MMMM YYYY HH:mm');
        $pages = Page::all();
        $tags = new Collection([
            (object) ['name' => 'Działki', 'id' => 1],
            (object) ['name' => 'Ogród', 'id' => 2],
            (object) ['name' => 'Kwiaty', 'id' => 3],
        ]);
        return view('news.show', compact('news','tags','pages'));
    }

    public function list()
    {
        $news = News::with('category')
        ->orderBy('date_publication', 'asc')
        ->get();

        $pages = Page::all();
        return view('panel.news.list', compact('news','pages'));
    }

    public function add()
    {
        $dataCarbon = Carbon::now();

        $pages = Page::all();
        $news = new News();
        $news->id=0;
        $news->date_publication = Carbon::now()->format('Y-m-d H:i');
        $news->setRelation('category', new NewsCategory());
        //$news->setRelation('photo', collect([new NewsPhoto()]));
        $news->setRelation('photo', collect());
        $action = 'create';
        $category = NewsCategory::all();

        return view('panel.news.form', compact('news','category','action','pages'));
    }


    public function edit(News $news)
    {

        $news = News::with(['category', 'photo' => function ($query) {
            $query->orderBy('sort', 'asc');
        }])->findOrFail($news->id);

        //Rozdziel wartość na datę i czas
        list($news->date, $news->time) = explode(" ", $news->date_publication);
        $pages = Page::all();
        $category = NewsCategory::all();
        $action = 'edit';
        //$localizationOptions = NewsPhoto::getEnumValues('localization');

        $tableName = 'news_photo';
        $columnName = 'localization';


        $enumOptions = DB::select("SHOW COLUMNS FROM {$tableName} WHERE Field = '{$columnName}'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);

        // Usunięcie pojedynczych cudzysłowów z każdej opcji
        $localizationOptions = array_map(function ($value) {
            return trim($value, "'");
        }, $enumValues);

        return view('panel.news.form', compact('news','category','action','pages','localizationOptions'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'date_publication' => 'required',
            'news_category_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);


        $news = new News();
        $news->title = $request->input('title');
        $news->lead = $request->input('lead');
        $news->description = $request->input('description');
        $news->date_publication = $request->input('date_publication');
        $news->news_category_id = $request->input('news_category_id');
        $news->save();
        $pom=0;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {

                $pom++;
                $uniqueId = substr(md5(time().rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/news/'.$news->id.'/gallery');


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
                $photo = new NewsPhoto();
                $photo->news_id = $news->id;
                $photo->name = $uniqueId;
                $photo->sort = $pom;
                $photo->top = 0;
                $photo->description = "";
                $photo->user_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.news.list')
            ->with('success', 'Wiadomość została utworzona.');
    }

    public function update(Request $request, News $news)
    {

      //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'date_publication' => 'required',
            'news_category_id' => 'required',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


       // dd($request);
        $news->update($request->all());
      //  dd('przed odbiorem zdjęć edycja');

        $pom = NewsPhoto::where('news_id', $news->id)->count();

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $pom++;
                $uniqueId = substr(md5(time().rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/news/'.$news->id.'/gallery');


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
                $photo = new NewsPhoto();
                $photo->news_id = $news->id;
                $photo->name = $uniqueId;
                $photo->description = "";
                $photo->top = 0;
                $photo->sort = $pom;
                $photo->user_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.news.list')
            ->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
       // dd($news);
       $photos = $news->photo;

    // Usuń każde zdjęcie fizycznie ze serwera
foreach ($photos as $photo) {


        if(Storage::exists('/news/'.$photo->news_id.'/gallery/'.$photo->name.'kw.webp')) {
            Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'kw.webp');
            Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'d.webp');
            Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'m.webp');
       

    }
}

        // Usuń wszystkie zdjęcia powiązane z tym news-em
        $news->photo()->delete(); // zakładając, że relacja w modelu News do zdjęć nazywa się "photos"

        $news->delete();

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

        $photo = NewsPhoto::find($request->photo_id);

        if ($request->top==null) {
            $top=0;
        } else  {
            NewsPhoto::where('news_id', $request->news_id)->update(['top' => 0]);
            $top=1;
        }



        $photo->description = $request->description;
        $photo->top = $top;
        $photo->localization = $request->localization;
        $photo->update();

        $url = route('panel.news.edit',$request->news_id).'#photo_'.$photo->id;

       return redirect($url)->with('success', 'Zdjęcie '.$request->photo_id.' zostało usunięte');

    }

    public function destroyPhotos(NewsPhoto $photo)
    {

        $photo = NewsPhoto::find($photo->id);
        $news_id = $photo->news_id;
        $photo_name = $photo->id.' ('.$photo->name.')';
        if ($photo) {

            if(Storage::exists('/news/'.$photo->news_id.'/gallery/'.$photo->name.'kw.webp'))
            {
                Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'kw.webp');
                Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'d.webp');
                Storage::delete('/news/'.$photo->news_id.'/gallery/'.$photo->name.'m.webp');
            }
            // Usuń informacje o zdjęciach z bazy danych
            $photo->delete();

            $url = route('panel.news.edit',$news_id).'#photo_list';


            return redirect($url)->with('success', 'Zdjęcie '.$photo_name.' zostało usunięte');
        } else {
            $url = route('panel.news.edit',$news_id).'#photo_'.$photo->id;

            return redirect($url)->with('error', 'Zdjęcie '.$photo_name.' nie zostało znalezione');
        }

    }


 public function changeOrderPhoto(Request $request, $id)
    {
        $photo = NewsPhoto::findOrFail($id);
        $currentSort = $photo->sort;

        if ($request->input('action') === 'up') {
            $swapWith = NewsPhoto::where('sort', '<', $currentSort)
                                ->orderBy('sort', 'desc')
                                ->first();
        } else {
            $swapWith = NewsPhoto::where('sort', '>', $currentSort)
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

}
