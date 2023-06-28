<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Signo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapperController extends Controller
{
    public function scrapperDay()
    {
        $user = Auth::user();

        $user_id = Auth()->user()->id_signo;

        $name_signo = DB::table('signo')
            ->where('signo.id', $user_id)
            ->value('signo.nome');

        //MAIN INFO
        $url = 'https://www.horoscope.com/us/horoscopes/general/horoscope-general-daily-today.aspx?sign=' . $user_id; // The URL you want to scrape
        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $response = $client->get($url);

        $html = (string) $response->getBody();

        $crawler = new Crawler($html);
        $paragrafoSemData = $crawler->filter('div.main-horoscope > p')->text();
        $data = substr($paragrafoSemData, 0, 13);
        $paragraphText = substr($paragrafoSemData, 15);

        //CAREER INFO
        $urlCarrer = 'https://www.horoscope.com/us/horoscopes/career/horoscope-career-daily-today.aspx?sign=' . $user_id; // The URL you want to scrape
        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $responseCareer = $client->get($urlCarrer);

        $htmlCareer = (string) $responseCareer->getBody();

        $crawlerCarrer = new Crawler($htmlCareer);
        $paragrafoCarrerComData = $crawlerCarrer->filter('div.main-horoscope > p')->text();
        $paragraphTextCarrer = substr($paragrafoCarrerComData, 15);

        //HEALTH INFO
        $urlHealth = 'https://www.horoscope.com/us/horoscopes/wellness/horoscope-wellness-daily-today.aspx?sign=' . $user_id; // The URL you want to scrape
        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $responseHealth = $client->get($urlHealth);

        $htmlHealth = (string) $responseHealth->getBody();

        $crawlerHealth = new Crawler($htmlHealth);
        $paragrafoHealthComData = $crawlerHealth->filter('div.main-horoscope > p')->text();
        $paragraphTextHealth = substr($paragrafoHealthComData, 15);


        return view('home', compact('user', 'paragraphText', 'data', 'paragraphTextCarrer', 'paragraphTextHealth', 'name_signo'));
    }

    public function scrapperWeek()
    {
        $user = Auth::user();

        $user_id = Auth()->User()->id_signo;

        $name_signo = DB::table('signo')
            ->where('signo.id', $user_id)
            ->value('signo.nome');

        $url = 'https://www.horoscope.com/us/horoscopes/general/horoscope-general-weekly.aspx?sign=' . $user_id; // The URL you want to scrape

        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $response = $client->get($url);

        $html = (string) $response->getBody();

        $crawler = new Crawler($html);
        $paragrafoSemData = $crawler->filter('div.main-horoscope > p')->text();
        $data = substr($paragrafoSemData, 0, 30);
        $paragraphText = substr($paragrafoSemData, 32);

        return view('tempo.semanal', compact('user', 'paragraphText', 'data', 'name_signo'));
    }

    public function scrapperMonth(Signo $signo)
    {
        $user = Auth::user();

        $user_id = Auth()->User()->id_signo;

        $name_signo = DB::table('signo')
        ->where('signo.id', $user_id)
        ->value('signo.nome');

        $url = 'https://www.horoscope.com/us/horoscopes/general/horoscope-general-monthly.aspx?sign=' . $user_id; // The URL you want to scrape

        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $response = $client->get($url);

        $html = (string) $response->getBody();

        $crawler = new Crawler($html);
        $paragrafoSemData = $crawler->filter('div.main-horoscope > p')->text();
        $data = substr($paragrafoSemData, 0, 9);
        //Texto Original, Sem Data, COM 2 Extra
        $paragraphText = substr($paragrafoSemData, 12);

        return view('tempo.mensal', compact('user', 'paragraphText', 'data', 'signo', 'name_signo'));
    }

    public function scrapperYear(Signo $signo)
    {
        $user = Auth::user();

        $user_id = Auth()->User()->id_signo;

        $ano_atual = date('Y');

        $name_signo = DB::table('signo')
        ->where('signo.id', $user_id)
        ->value('signo.nome');

        $url = 'https://www.horoscope.com/us/horoscopes/yearly/' . $ano_atual . '-horoscope-' . $name_signo . '.aspx'; // The URL you want to scrape

        $client = new Client([
            'verify' => 'cc/cacert.pem'
        ]);
        $response = $client->get($url);

        $html = (string) $response->getBody();

        $crawler = new Crawler($html);
        $paragrafoSemData = $crawler->filter('section#personal > p')->text();

        //Texto Original, Sem Data, COM 2 Extra
        $paragraphText = substr($paragrafoSemData, 12);

        return view('tempo.anual', compact('user', 'paragrafoSemData', 'ano_atual', 'signo', 'name_signo'));
    }
}
