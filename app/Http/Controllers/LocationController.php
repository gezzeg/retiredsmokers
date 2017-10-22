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
    public function edit()
    {
        //
        //dd($id);//23
        //Sentinel::getUser()->id
        //dd(Sentinel::getUser()->id);
        if(Sentinel::check()){

            $id=Sentinel::getUser()->id;

            $user=User::whereId($id)->firstOrFail();
        
            return view('locations.edit',compact('user','map'));

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        if($request){

            if(Sentinel::check()){

                $id=Sentinel::getUser()->id;    

            $userProfile = Profile::whereUserId($id)->firstOrFail();
            //$userProfile->dob = $request->dob;
            //$userProfile->smoked = $request->smoked;
            $userProfile->lat = $request->lat;
            $userProfile->lng = $request->lng;
            $userProfile->city = $request->city;
            $userProfile->state = $request->state;
            $userProfile->country = $request->country;
            $userProfile->postcode = $request->postcode;
            //$userProfile->phone = $request->phone;
            $userProfile->save();
             
            return redirect()->back()->with('status','Update Successful!');

            }
       
       }else
       
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
