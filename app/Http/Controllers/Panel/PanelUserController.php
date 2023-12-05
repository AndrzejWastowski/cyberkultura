<?php
namespace App\Http\Controllers\Panel;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    
    public function add ($user)
    {
        $users = User::find($user);
        $pages = Page::all();
        $action = 'add';
        return view('panel.user.form_user',compact('pages','action','user'));
    }

    public function edit ($user)
    {
        $users = User::find($user);
        $pages = Page::all();
        $action = 'edit';
        return view('panel.user.form_user',compact('pages','action','user'));
    }
}
