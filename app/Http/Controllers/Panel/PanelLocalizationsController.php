<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Localization;
use App\Models\Organization;
use App\Models\Page;
use Illuminate\Http\Request;

class PanelLocalizationsController extends Controller
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
        $localization = Localization::all();
        return view('panel.localization.index', compact('localization'));
    }


    public function list()
    {
        $localizations = Localization::orderBy('name', 'asc')->get();

        $pages = Page::all();
        return view('panel.localization.list', compact('localizations','pages'));
    }

    public function show(Request $request)
    {
        $link = request()->route()->parameter('localization');

    //      DB::table('page')->where('link', 'like', "%$page%")->first(),
    //        $page = Page::findOrFail($request->id);

     /*   switch ($link)
        {
            case 'panel': $this->callAction('App\Http\Controllers\PanelController@index',['id'=>1]);
        }
    */
        $localization = Localization::where('link', 'like', "%$link%")->first();

        if (!$localization) {
            return redirect()->route('404');
        }

        return view('show', compact('localization'));
    }

    public function add()
    {
        $pages = Page::all();
        $localization = new Localization();
        $action = "create";
        $organizations = Organization::all();
        return view('panel.localization.form_localization',compact('localization','action','pages','organizations'));
    }

    public function create(Request $request)
    {
        $messages = [
            'www.regex' => 'Pole ":attribute" musi zawierać tylko znaki ascii i kropki.',
            'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'country' => 'Pole ":attribute jest wymagane',
            'description' => 'Pole ":attribute jest wymagane',
            'organizations_id' => 'Pole ":attribute jest wymagane',
            'organizations_id.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
            'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
            'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
            'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'organizations_id' => [
                'required',
                'integer',
                'not_regex:/\d+\.\d+/'
            ],
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'description' => 'required',
            'postcode' => [
                'nullable',
                'regex:/^\d{5}$|^\d{2}-\d{3}$/'
            ],
            'lat' =>   ['nullable', 'numeric', 'min:-90', 'max:90'], // Współrzędna szerokości geograficznej
            'lng' =>        ['nullable', 'numeric', 'min:-180', 'max:180'], // Współrzędna długości geograficznej
], $messages);



        $destinationPath = public_path('/storage/localization/images');

        $localization = new Localization();

        $localization->name = $validatedData['name'];
        $localization->organizations_id = $validatedData['organizations_id'];
        $localization->country = $validatedData['country'];
        $localization->city = $validatedData['city'];
        $localization->postcode = $validatedData['postcode'];
        $localization->street = $validatedData['street'];
        $localization->description = $validatedData['description'];
        $localization->lat = $validatedData['lat'];
        $localization->lng = $validatedData['lng'];

        $localization->save();

        return redirect()->route('panel.localization.list')->with('success', 'Organizacja dodana poprawnie ');
    }

    public function edit($page)
    {
        $pages = Page::all();
        $localization = Localization::findOrFail($page);
        $action = "edit";
        $organizations = Organization::all();
        return view('panel.localization.form_localization',compact('localization','action','pages','organizations'));
    }

    public function update(Request $request, $id)
    {

        $messages = [
                        'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
                        'description' => 'Pole ":attribute jest wymagane',
                        'organizations_id' => 'Pole ":attribute jest wymagane',
                        'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
                        'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
                        'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
                        'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
                        'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
                        'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'country' => 'required',
            'organizations_id' => 'required',
            'city' => 'required',
            'street' => 'required',
            'description' => 'required',
            'postcode' => [
                'nullable',
                'regex:/^\d{5}$|^\d{2}-\d{3}$/'
            ],
            'lat' =>   ['nullable', 'numeric', 'min:-90', 'max:90'], // Współrzędna szerokości geograficznej
            'lng' =>        ['nullable', 'numeric', 'min:-180', 'max:180'], // Współrzędna długości geograficznej
], $messages);


        $localization = Localization::findOrFail($id);

        $localization->name = $validatedData['name'];
        $localization->organizations_id = $validatedData['organizations_id'];
        $localization->country = $validatedData['country'];
        $localization->city = $validatedData['city'];
        $localization->postcode = $validatedData['postcode'];
        $localization->street = $validatedData['street'];
        $localization->description = $validatedData['description'];
        $localization->lat = $validatedData['lat'];
        $localization->lng = $validatedData['lng'];

        $localization->update();


        return redirect()->route('panel.localization.list')->with('success', 'Localization updated successfully');
    }

    public function destroy($id)
    {
        $localization = Localization::findOrFail($id);
        $localization->delete();

        return redirect()->route('panel.localization.list')->with('success', 'Localization deleted successfully');
    }
}
