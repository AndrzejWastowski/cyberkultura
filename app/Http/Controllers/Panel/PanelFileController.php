<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as MyFile;


class PanelFileController extends Controller
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
    public function list ()
    {
        $pages = Page::all();
        $files = File::all();
        return view('panel.files.lists', compact('files','pages'));
    }
    public function add()
    {
        $pages = Page::all();
        $action = 'create';
        $date_publication = Carbon::now()->format('Y-m-d');
        $date_end = Carbon::now()->addYears (3)->format('Y-m-d');

        $file = new File;
        $file->filename = '';
        $file->name = '';
        $file->description = '';
        $file->date_publication = $date_publication;
        $file->date_end = $date_end;


        return view('panel.files.form',compact('pages','file','date_publication','date_end','action'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'file_document' => 'required|file|mimes:pdf,doc,docx,xml,odt|max:2048',
                'date_publication' => 'required|date',
                'date_end' => 'required|date|after_or_equal:date_publication',
            ]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {

            back()->withErrors($e->errors());
        }

        if ($request->hasFile('file_document')) {

            $file = $request->file('file_document');
            $filename = $file->get();
            if ($file) {

                $originalFileName = $file->getClientOriginalName();
                $sanitizedFileName = sanitizeFileName($originalFileName);

             // Przykład 1: Użycie put() do zapisania pliku w katalogu publicznym (np. /public/downloads)
           MyFile::put(public_path('storage/downloads/'.$sanitizedFileName), $filename);

            // Przykład 2: Użycie move() do przeniesienia przesłanego pliku do katalogu publicznego
            //$request->file($filename)->move(public_path('storage/downloads/'), $sanitizedFileName);

            }

            $file = new File;
            $file->filename = $sanitizedFileName;
            $file->name = $request->name;
            $file->description = $request->description;
            $file->date_publication = $request->date_publication;
            $file->date_end = $request->date_end;
            $file->save();

        } else
        {
            return redirect()->route('panel.files.add')
            ->with('error', 'Plik nie przesłany.');
        }

        return  redirect()->route('panel.files.list');
    }

    public function edit($id)
    {
        $action = 'edit';
        $pages = Page::all();
        $file = File::find($id);
        $date_publication = $file->date_publication;
        $date_end = $file->date_end;
        return view('panel.files.form',compact('pages','file','date_publication','date_end','action'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_publication' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_publication',
        ]);

        $file = File::find($id);
        $file->name = $request->name;
        $file->description = $request->description;
        $file->date_publication = $request->date_publication;
        $file->date_end = $request->date_end;
        $file->save();

        return redirect('files');
    }

    public function destroy($id)
    {
        $file = File::find($id);

        // Ścieżka do pliku, który chcesz usunąć
        $filePath = public_path('storage/downloads/' . $file->filename);

        // Sprawdź, czy plik istnieje przed usunięciem
        if (MyFile::exists($filePath)) {
            // Usuń plik
            MyFile::delete($filePath);
            echo "Plik został pomyślnie usunięty.";
        } else {
            echo "Plik nie istnieje, nie można go usunąć.";
        }
        $file->delete();
        return  redirect()->route('panel.files.list');
    }
}
