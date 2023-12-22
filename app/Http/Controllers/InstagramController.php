<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InstagramController extends Controller
{
    public function show()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://graph.instagram.com/me/media', [
            'query' => [
                'fields' => '251255367323684,caption,media_type,media_url',
                'access_token' => '251255367323684|bOJg_cpBHkmAAMk9gI1laww5Gco'
            ]
        ]);

        dd($response);

        $photos = json_decode($response->getBody()->getContents());

        return view('instagram', compact('photos'));
    }
}


