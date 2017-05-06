<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

use Sentinel;

use Mapper;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::All();
        //$profile=Profile::All();
        return view('locations.index',compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //
        $users=User::All();
        //$profile=Profile::All();
        return view('locations.testmap',compact('users'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cluster()
    {
        //
        $users=User::All();
        //$profile=Profile::All();
        return view('locations.cluster',compact('users'));

    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //



        
        //if(Sentinel::check()){
            //dd(Sentinel::getUser()->id);
            $user=User::whereId(Sentinel::getUser()->id)->firstOrFail();
            
            //$user=User::whereId($id)->firstOrFail();

           // dd($user);
            return view('locations.show',compact('user','map'));

      //  }
        

        /*
        $user=User::whereId($id)->firstOrFail();

        

       // Mapper::map(53.381128999999990000, -1.470085000000040000,['marker'=>false]);
        

       // Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventClick' => 'console.log("left click");']);
        

        return view('locations.show',compact('user','map'));
*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd($id);//23
        //Sentinel::getUser()->id
        //dd(Sentinel::getUser()->id);

        $user=User::whereId($id)->firstOrFail();
        

        //Set Up Map
        //Mapper::map(53.381128999999990000, -1.470085000000040000,['marker'=>false]);
        //Set Up Marker, Dragable and Listener
        //Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'var lat=event.latLng.lat();var lng=event.latLng.lng(); document.getElementById("lat").value=lat; document.getElementById("lng").value=lng;']);

       

        return view('locations.edit',compact('user','map'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if($request){

        $userProfile = Profile::whereUserId($id)->firstOrFail();
        //$userProfile->dob = $request->dob;
        //$userProfile->smoked = $request->smoked;
        $userProfile->lat = $request->lat;
        $userProfile->lng = $request->lng;
        $userProfile->city = $request->city;
        $userProfile->country = $request->country;
        $userProfile->postcode = $request->postcode;
        //$userProfile->phone = $request->phone;
        $userProfile->save();
        
        //return redirect()->action('ProfileController@edit');

        //return redirect()->route('locationEdit', ['id' => 1])->with('success','Update Successful !');
        return redirect()->back()->with('status','Update Successful!');

        //->route('profile',$id)->with('success','Update Successful !');;
       
       }else
       //return redirect('/location')->with('error','Update Failed !');;
       return redirect()->back()->withErrors('Update Failed !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    
}
