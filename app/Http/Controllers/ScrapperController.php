<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapperController extends Controller
{
    public function scrapper()
    {
        $user = Auth::user();

        $user_id = Auth()->User()->id_signo;

        $url = 'https://www.horoscope.com/us/horoscopes/general/horoscope-general-daily-today.aspx?sign=' . $user_id; // The URL you want to scrape
    
        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $response = $client->get($url);
    
        $html = (string) $response->getBody();
    
        $crawler = new Crawler($html);
        $paragrafoSemData = $crawler->filter('div.main-horoscope > p')->text();        
        $data = substr($paragrafoSemData, 0, 13);
        $paragraphText = substr($paragrafoSemData,15);
        
        return view('home', compact('user', 'paragraphText', 'data'));
    }
}
