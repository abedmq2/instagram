<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpfastcache\Helper\Psr16Adapter;
use InstagramScraper\Instagram;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                return view('home');

        $instagram = Instagram::withCredentials('abedmq2', '0598700543Aa!@', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you can force login $instagram->login(true)


        $medias = $instagram->getMedias('sserkan34',100);
//        dd($result);
//        $medias = $result['medias'];
        foreach($medias as $media) {
            echo "<img src=". ($media->getImageHighResolutionUrl() )." width=33% style='float:right'	/>";

        }
//            dd($tags);
    }
}
