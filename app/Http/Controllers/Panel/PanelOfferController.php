<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\OfferPhoto;
use App\Models\OfferCategory;
use App\Models\OfferTranslation;
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


class PanelOfferController extends Controller
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
        $offers = Offer::join('offers_translations', 'offers_translations.offers_id', '=', 'offers.id')
            ->where('offers_translations.locale', 'pl')
            ->orderBy('offers_translations.name', 'asc')
            ->get();

        $pages = Page::all();
        return view('panel.offers.list', compact('offers', 'pages'));
    }

    public function add()
    {
        $dataCarbon = Carbon::now();

        $pages = Page::all();
        $offer = new Offer();
        $offer->id = 0;

        //$offer->setRelation('photo', collect([new OfferPhoto()]));
        $offer->setRelation('photo', collect());
        $action = 'create';
        return view('panel.offers.form', compact('offer', 'action', 'pages'));
    }


    public function edit(Offer $offer)
    {


        $offer = Offer::join('offers_translations', 'offers_translations.offers_id', '=', 'offers.id')
            ->where('offers_translations.locale', '=', 'pl')

            ->orderBy('offers_translations.name', 'asc')

            ->findOrFail($offer->id);


        $pages = Page::all();
        $action = 'edit';

        $tableName = 'offers_photo';
        $columnName = 'localization';

        // $localizationOptions = OfferPhoto::getEnumValues('localization');
        $enumOptions = DB::select("SHOW COLUMNS FROM {$tableName} WHERE Field = '{$columnName}'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enumOptions, $matches);
        $enumValues = explode(',', $matches[1]);

        // Usunięcie pojedynczych cudzysłowów z każdej opcji
        $localizationOptions = array_map(function ($value) {
            return trim($value, "'");
        }, $enumValues);




        $tableName = 'offers_photo';
        $columnName = 'localization';


        return view('panel.offers.form', compact('offer', 'action', 'pages', 'localizationOptions'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'lead' => 'required',
            'description' => 'required',
            'offer_category_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);


        $offer = new Offer();
        $offer->title = $request->input('title');
        $offer->lead = $request->input('lead');
        $offer->description = $request->input('description');
        $offer->offer_category_id = $request->input('offer_category_id');
        $offer->save();
        $pom = 0;
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {

                $pom++;
                $uniqueId = substr(md5(time() . rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/offer/' . $offer->id . '/gallery');


                // Sprawdź, czy folder docelowy istnieje, a jeśli nie, utwórz go


                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Przetwarzanie i zapisywanie obrazu (tak jak wcześniej)
                $img = Image::make($image->path());
                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save($destinationPath . '/' . $uniqueId . 'm.webp');

                $img = Image::make($image->path());
                $img->fit(350, 350)->encode('webp')->save($destinationPath . '/' . $uniqueId . 'kw.webp');

                $img = Image::make($image->path());
                $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp')->save($destinationPath . '/' . $uniqueId . 'd.webp');

                // Zapisywanie ścieżki do bazy danych
                $photo = new OfferPhoto();

                $photo->offers_id = $offer->id;
                $photo->name = $uniqueId;
                $photo->top = 0;
                $photo->sort = $pom;
                $photo->users_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.offer.list')
            ->with('success', 'Wiadomość została utworzona.');
    }

    public function update(Request $request, Offer $offer)
    {

        $offerTranslation = OfferTranslation::where('offers_translations.locale', '=', 'pl')
            ->where('offers_translations.offers_id', '=', $offer->id)->first();


        $request->except('_token');
        //  dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lead' => 'required',
            'offers_id' => 'required',
            'gallery_id' => 'nullable',
            'locale' => 'required',
            'short_description' => 'required',
            'lead' => 'nullable',
            'description' => 'nullable',
            'images' => 'array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataToUpdate = $request->only([
            'name',
            'lead',
            'offers_id',
            'gallery_id',
            'locale',
            'short_description',
            'lead',
            'description',
        ]);


        $offerTranslation->update($dataToUpdate);

        $pom = OfferPhoto::where('offers_id', $offer->id)->count();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $pom++;
                $uniqueId = substr(md5(time() . rand()), 0, 8);
                // Tworzenie unikalnej nazwy dla każdego obrazu
                // Miejsce docelowe
                $destinationPath = public_path('/offer/' . $offer->id . '/gallery');

                if (!Storage::exists($destinationPath)) {
                    Storage::makeDirectory($destinationPath, 0755, true, true);
                }


                $img = Image::make($image->path());

                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp')->save("{$destinationPath}/{$uniqueId}m.webp");

                $img = Image::make($image->path());
                $img->fit(350, 350)->encode('webp')->save("{$destinationPath}/{$uniqueId}kw.webp");

                $img = Image::make($image->path());
                $img->resize(1980, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp')->save("{$destinationPath}/{$uniqueId}d.webp");


                // Zapisywanie ścieżki do bazy danych
                $photo = new OfferPhoto();
                $photo->offers_id = $offer->id;
                $photo->name = $uniqueId;
                $photo->top = 0;
                $photo->sort = $pom;
                $photo->users_id = Auth::id(); // Dodaj t
                $photo->save();
            }
        }

        return redirect()->route('panel.offers.list')
            ->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        // dd($offer);
        $photos = $offer->photo;

        // Usuń każde zdjęcie fizycznie ze serwera
        foreach ($photos as $photo) {

            $destinationPath = public_path('/offer/' . $photo->offer_id . '/gallery');

            if (Storage::exists($destinationPath . '/' . $photo->name . 'kw.webp')) {
                Storage::delete($destinationPath . '/' . $photo->name . 'kw.webp');
                Storage::delete($destinationPath . '/' . $photo->name . 'd.webp');
                Storage::delete($destinationPath . '/' . $photo->name . 'm.webp');
            }
        }

        // Usuń wszystkie zdjęcia powiązane z tym offer-em
        $offer->photo()->delete(); // zakładając, że relacja w modelu Offer do zdjęć nazywa się "photos"

        $offer->delete();

        return redirect()->route('panel.offer.list')
            ->with('success', 'Offer deleted successfully.');
    }


    public function editPhotos(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'photo_id' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = OfferPhoto::find($request->photo_id);

        if ($request->top == null) {
            $top = 0;
        } else {
            OfferPhoto::where('offers_id', $request->offers_id)->update(['top' => 0]);
            $top = 1;
        }

        $photo->top = $top;
        $photo->localization = $request->localization;
        $photo->description = $request->description;
        $photo->update();


        $url = route('panel.offers.edit', $request->offers_id) . '#photo_' . $photo->id;

        return redirect($url)->with('success', 'Zdjęcie ' . $request->photo_id . ' zostało usunięte');
    }

    public function destroyPhotos(OfferPhoto $photo)
    {

        $photo = OfferPhoto::find($photo->id);
        $offers_id = $photo->offers_id;
        $photo_name = $photo->id . ' (' . $photo->name . ')';

        if ($photo) {

            $destinationPath = public_path('/offer/' . $photo->offers_id . '/gallery');
            //$destinationPath = '/offer/'.$photo->offers_id.'/gallery';
         

            if (Storage::exists($destinationPath)) {
                Storage::delete($destinationPath . '/' . $photo->name . 'kw.webp');
                Storage::delete($destinationPath . '/' . $photo->name . 'd.webp');
                Storage::delete($destinationPath . '/' . $photo->name . 'm.webp');
            } else {
                dd('nie znaleziono sciezki: ' . $destinationPath . '/' . $photo->name . 'kw.webp');
            }
            // Usuń informacje o zdjęciach z bazy danych
            //  $photo->delete();

            $url = route('panel.offers.edit', $offers_id) . '#photo_list';


            return redirect($url)->with('success', 'Zdjęcie ' . $photo_name . ' zostało usunięte');
        } else {
            $url = route('panel.offers.edit', $offers_id) . '#photo_' . $photo->id;

            return redirect($url)->with('error', 'Zdjęcie ' . $photo_name . ' nie zostało znalezione');
        }
    }


    public function changeOrderPhoto(Request $request, $id)
    {
        $photo = OfferPhoto::findOrFail($id);
        $currentSort = $photo->sort;

        if ($request->input('action') === 'up') {
            $swapWith = OfferPhoto::where('sort', '<', $currentSort)
                ->orderBy('sort', 'desc')
                
                ->first();
        } else {
            $swapWith = OfferPhoto::where('sort', '>', $currentSort)
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


        $url = route('panel.offers.edit', $photo->offers_id) . '#photo_' . $photo->id;

        return redirect($url)->with('success', 'Zdjęcie ' . $photo->name . ' przesunięte');
    }


    private function set_top($photo_id)
    {
    }
}
