<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Page;
use Illuminate\Http\Request;

class PanelOrganizationsController extends Controller
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
        $organization = Organization::all();
        return view('panel.organization.index', compact('organization'));
    }


    public function list()
    {
        $organizations = Organization::orderBy('name', 'asc')->get();

        $pages = Page::all();
        return view('panel.organization.list', compact('organizations','pages'));
    }

    public function show(Request $request)
    {
        $link = request()->route()->parameter('organization');

    //      DB::table('page')->where('link', 'like', "%$page%")->first(),
    //        $page = Page::findOrFail($request->id);

     /*   switch ($link)
        {
            case 'panel': $this->callAction('App\Http\Controllers\PanelController@index',['id'=>1]);
        }
    */
        $organization = Organization::where('link', 'like', "%$link%")->first();

        if (!$organization) {
            return redirect()->route('404');
        }

        return view('show', compact('organization'));
    }

    public function add()
    {
        $pages = Page::all();
        $organization = new Organization();
        $action = "create";
        return view('panel.organization.form_organization',compact('organization','action','pages'));
    }

    public function create(Request $request)
    {

        $messages = [
            'www.regex' => 'Pole ":attribute" musi zawierać tylko znaki ascii i kropki.',
            'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'description' => 'Pole ":attribute jest wymagane',
            'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
            'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
            'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
            'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'www' => ['nullable', 'regex:/^[a-zA-Z0-9\.\s]+$/'],
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

        $destinationPath = public_path('/storage/organizations/images');

        $organization = new Organization();

        $organization->name = $validatedData['name'];
        $organization->www = $validatedData['www'];
        $organization->country = $validatedData['country'];
        $organization->city = $validatedData['city'];
        $organization->postcode = $validatedData['postcode'];
        $organization->street = $validatedData['street'];
        $organization->description = $validatedData['description'];
        $organization->lat = $validatedData['lat'];
        $organization->lng = $validatedData['lng'];

        $organization->save();

        return redirect()->route('panel.organization.list')->with('success', 'Organizacja dodana poprawnie ');
    }

    public function edit($page)
    {
        $pages = Page::all();
        $organization = Organization::findOrFail($page);
        $action = "edit";
        return view('panel.organization.form_organization',compact('organization','action','pages'));
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'www.regex' => 'Pole ":attribute" musi zawierać tylko znaki ascii i kropki.',
            'postcode.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'description' => 'Pole ":attribute jest wymagane',
            'lat.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lat.min' => 'Pole ":attribute" nie może być mniejsze niż -90.',
            'lat.max' => 'Pole ":attribute" nie może być większe niż 90.',
            'lng.numeric' => 'Pole ":attribute" musi być liczbą.',
            'lng.min' => 'Pole ":attribute" nie może być mniejsze niż -180.',
            'lng.max' => 'Pole ":attribute" nie może być większe niż 180.',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'www' => ['nullable', 'regex:/^[a-zA-Z0-9\.\s]+$/'],
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


        $organization = Organization::findOrFail($id);

        $organization->name = $validatedData['name'];
        $organization->www = $validatedData['www'];
        $organization->country = $validatedData['country'];
        $organization->city = $validatedData['city'];
        $organization->postcode = $validatedData['postcode'];
        $organization->street = $validatedData['street'];
        $organization->description = $validatedData['description'];
        $organization->lat = $validatedData['lat'];
        $organization->lng = $validatedData['lng'];

        $organization->update();


        return redirect()->route('panel.organization.list')->with('success', 'Organization updated successfully');
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return redirect()->route('panel.organization.list')->with('success', 'Organization deleted successfully');
    }
}
