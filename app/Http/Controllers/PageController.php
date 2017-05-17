<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
    	return view('home');
    }
   public function about()
    {
    	return view('about');
    }

   public function map()
    {
    	return view('map');
    }

    public function test()
    {
        $json_string = 'https://test.httpapi.com/api/domains/available.json?auth-userid=182065&api-key=UYnvRZLQ69TGWHajdpUttl0Qj7nfQJsA&domain-name=ghazalitajuddin&tlds=com&tlds=net';
        $jsondata = file_get_contents($json_string);
        $obj = json_decode($jsondata,true);

        return view('test',compact('obj')); 
    }

}
