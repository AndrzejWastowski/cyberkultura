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
                'fields' => 'id,caption,media_type,media_url',
                'access_token' => 'TWÓJ_ACCESS_TOKEN'
            ]
        ]);

        $photos = json_decode($response->getBody()->getContents());

        return view('instagram', compact('photos'));
    }
}
