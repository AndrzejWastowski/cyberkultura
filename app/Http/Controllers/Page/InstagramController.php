<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InstagramController extends Controller
{
    public function getInstagramPhotos()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token='.env('INSTAGRAM_API_KEY'));
        $photos = json_decode($response->getBody(), true)['data'];

        return view('instagram.photos', compact('photos'));
    }
}