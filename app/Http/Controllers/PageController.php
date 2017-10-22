<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Sentinel;

class PageController extends Controller
{
    //
    public function index()
    {
        $users = User::All();
    	return view('pages.home',compact('users'));
    }

    public function dashboard(){

        $id=Sentinel::getUser()->id;
        $you=User::whereId($id)->first();

        $users = User::All();
        return view('members.index',compact('users','you'));
    }

     public function articles()
    {
        return view('admin.articles');
    }

    public function admin()
    {
        return view('adminlte');
    }
    
   public function about()
    {
    	return view('pages.about');
        //return view('about-new'); //
        //return view('forms');

    }

    public function profile2()
    {
    	//return view('about');
       //return view('about-new'); //
        return view('admin.profile');

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

    public function newtheme(){
        return view('pages.newtheme');
    }

}
