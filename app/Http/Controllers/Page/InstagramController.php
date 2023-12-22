<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InstagramController extends Controller
{

    public function showInstagram($username)
    {
        // Znajdź profil Instagram na podstawie nazwy użytkownika
        $profile = Profile::where('username', $username)->first();
        return view('instagram-auth-page', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);

        // Sprawdź, czy profil istnieje
        if (!$profile) {
            abort(404, "Profil Instagram nie znaleziony.");
        }

        // Pobierz najnowsze zdjęcia z Instagrama
        try {
            $photos = $profile->latestMedia()->get();
        } catch (\Exception $e) {
            // Obsłuż wyjątki, np. błędy połączenia z API
            abort(500, "Błąd podczas pobierania danych z Instagrama: " . $e->getMessage());
        }

        // Przekazanie zdjęć do widoku
        return view('instagram', ['photos' => $photos]);
    }

    public function show()
    {
        return view('instagram.show');
    }
    
    public function show2()
    {
        $client = new Client();
       
        $response = $client->request('GET', 'https://graph.facebook.com/v18.0/me/accounts', [
            'query' => [
                'fields' => 'id,caption,media_type,media_url',
                'access_token' => '251255367323684|bOJg_cpBHkmAAMk9gI1laww5Gco'
            ]
        ]);
       dd($response);

        $photos = json_decode($response->getBody()->getContents());

        return view('instagram.photos', compact('photos'));
    }


    public function getInstagramPhotos()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://graph.instagram.com/me/media', [
            'query' => [
                'fields' => 'id,caption,media_type,media_url',
                'access_token' => env('INSTAGRAM_API_KEY')
            ]
        ]);
       dd($response);

        $photos = json_decode($response->getBody()->getContents());

        return view('instagram.photos', compact('photos'));
    }

}