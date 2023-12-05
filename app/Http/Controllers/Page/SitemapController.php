<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Tags\News;
use App\Models\Page; // Załóżmy, że masz model Page
use App\Models\Offer;

class SitemapController extends Controller
{

    public function sitemap()
    {

        return view('page.sitemap.show');
    }
    
    public function generate()
    {

        $sitemap = Sitemap::create();

        // Dodaj URL-i niestandardowe
        $customUrls = [
            [
                'url' => 'https://kalendarium.kutno.pl',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'url' => 'https://kalendarium.kutno.pl/kalendarium',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'url' => 'https://kalendarium.kutno.pl/wiadomosci',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ],
            [
                'url' => 'https://kalendarium.kutno.pl/kalendarium/nastepny_weekend',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'url' => 'https://www.kalendarium.kutno.pl/kontakt',
                'lastmod' => '2023-11-10',
                'changefreq' => 'yearly',
                'priority' => '0.1',
            ],
            [
                'url' => 'https://www.kalendarium.kutno.pl/reklama',
                'lastmod' => '2023-11-29',
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'url' => 'https://kalendarium.kutno.pl/organizacje',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'weekly',
                'priority' => '0.5',
            ],
            [
                'url' => 'https://kalendarium.kutno.pl/lokalizacje',
                'lastmod' => Carbon::parse(now()),
                'changefreq' => 'weekly',
                'priority' => '0.5',
            ],
        ];

        // Dodaj inne niestandardowe URL-i
        $sitemap = Sitemap::create("https://kalendarium.kutno.pl");

        foreach ($customUrls as $url) {
            $sitemap->add(
                Url::create($url['url'])
                    ->setLastModificationDate(Carbon::parse($url['lastmod']))
                    ->setChangeFrequency($url['changefreq'])
                    ->setPriority($url['priority'])
            );
        }

        // Dodaj pozostałe URL-i z automatycznego odnajdywania
        //$sitemap->add('/automatyczny-url-1', null, 'daily', 0.8);

        // Dodaj inne URL-i automatycznie

        $events = Offer::with(['category',])
            ->orderBy('date', 'desc')
            ->get();

        foreach ($events as $url) {
            $sitemap->add(
                Url::create('https://kalendarium.kutno.pl/kalendarium/' . $url['id'] . '/' . str_replace(' ', '-', $url['title']))
                    ->setLastModificationDate(Carbon::parse($url['date']))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority('0.9')

            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return response()->make('Sitemap generated!');
    }
}
