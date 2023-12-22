<?php
namespace App\Http\Controllers\Panel;

use App\Models\Page;
use App\Models\User;
use App\Models\Calendary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Localization;
use App\Models\Organization;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PanelUserController extends Controller
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

    public function list()
    {
        $users = User::all();
        $pages = Page::all();
        return view('panel.user.list',compact('pages','users'));
    }

    public function show()
    {
        $pages = Page::all();
        return view('panel.user.show',compact('pages'));
    }

    public function add ()
    {
        $user = new User;
        $pages = Page::all();
        $action = 'create';
        $user_groups = UserGroup::all();
        return view('panel.user.form',compact('pages','action','user','user_groups'));
    }

    public function create (Request $request)
    {
        $messages = [
            'passwd.min' => 'Pole ":attribute" musi zawierać tylko znaki ascii i kropki.',
            'passwd.confirmed' => 'Pola "hasło" i "potwierdź hasło" muszą być identyczne.',
            'email.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'email' => 'Pole ":attribute jest wymagane',
            'email' => 'Pole "email musi być adresem email',
            'description' => 'Pole ":attribute jest wymagane',
            'users_groups_id' => 'Pole ":attribute jest wymagane',
            'users_groups_id.numeric' => 'Pole ":attribute" musi być liczbą'
        ];

        $validate = $request->validate([
            'name' => 'required|string|min:5|max:250',
            'passwd' => 'nullable|string|min:8|confirmed',
            'users_groups_id' => 'required|numeric',
            'email' => 'required|email',
            'signature' => 'nullable|string|min:2|max:50',
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'signature' => $validate['signature'],
            'users_groups_id' => $validate['users_groups_id'],
            'permission' => $validate['users_groups_id'],
            'password' => Hash::make($validate['passwd']),
            'social_id'=> 0,
            'social_type' => 'local'
        ]);


        $users = User::all();
        $pages = Page::all();
        return view('panel.user.list',compact('pages','users'));
    }

    public function mainprofile ()
    {

        //$user = Auth::
        $action = 'edit';
        $pages = Page::all();

            $user = User::find(Auth::user()->id);
            dd($user);


            $user_groups = UserGroup::all();
            return view('panel.user.form',compact('pages','action','user','user_groups'));
       
        return view('panel.nopermision_form',compact('pages'));

    }

    public function edit ($user)
    {
        $action = 'edit';
        $pages = Page::all();
        if (auth()->user()->isAdmin())
        {
            $user = User::find($user);

          
            $user_groups = UserGroup::all();
            return view('panel.user.form',compact('pages','action','user','user_groups'));
        }
        return view('panel.nopermision_form',compact('pages'));

    }

    public function update (Request $request)
    {

        $messages = [
            'passwd.min' => 'Pole ":attribute" musi zawierać tylko znaki ascii i kropki.',
            'passwd.confirmed' => 'Pola "hasło" i "potwierdź hasło" muszą być identyczne.',
            'email.regex' => 'Pole ":attribute" musi być pięciocyfrowym kodem pocztowym.',
            'email' => 'Pole ":attribute jest wymagane',
            'email' => 'Pole "email musi być adresem email',
            'description' => 'Pole ":attribute jest wymagane',
            'users_groups_id' => 'Pole ":attribute jest wymagane',
            'users_groups_id.numeric' => 'Pole ":attribute" musi być liczbą'
        ];

        $validate = $request->validate([
            'name' => 'required|string|min:5|max:250',
            'passwd' => 'nullable|string|min:8|confirmed',
            'users_groups_id' => 'required|numeric',
            'email' => 'required|email',
            'signature' => 'nullable|string|min:2|max:50',
        ]);

        $user = User::find(request('id'));
        $user->email = request('email');
        $user->signature = request('signature');
        $user->name = request('name');
        $user->users_groups_id = request('users_groups_id');
        $user->permission = request('users_groups_id');

        $passwd = request('passwd');

        if (isset($passwd))  {
            $user->password = Hash::make(request('passwd'));
        }

        $user->update();
        $users = User::all();
        $pages = Page::all();
        return view('panel.user.list',compact('pages','users'));
    }

    public function destroy($user)
    {

        $user = User::findOrFail($user);
     

        //Usunięcie użytkownika
        $user->hidden();

        return redirect()->route('panel.user.list')->with('success', 'Użytkownik został usunięty!');
    }

    public function hidden($user)
    {

        $user = User::findOrFail($user);
        $user->hidden = 1;
        $user->update();

        return redirect()->route('panel.user.list')->with('success', 'Użytkownik został usunięty!');
    }

    public function someProtectedMethod()
{
    /*
    // Sprawdzanie, czy użytkownik jest edytorem lub administratorem
    if (!auth()->user()->isEditor() && !auth()->user()->isAdmin()) {
        return redirect()->route('nazwa.trasy'); // przekierowanie na inną stronę
    }

    // Kontynuacja działania metody, jeśli użytkownik ma uprawnienia
    // ...
    */
}


}
