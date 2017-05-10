<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileFormRequest;

use App\User;

use App\Profile;

use App\SmokingRecord;

class ProfileController extends Controller
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
    $profiles=Profile::All();

    return view('profiles.index',compact('users','profiles'));  


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

        

        //getUserID
        //$user=User::whereEmail('email@email.com')->firstOrFail();
       

       // $user = User::whereId($id)->firstOrFail();
       //$user = User::find($id)->firstOrFail();

      // dd($user);

        //$user=User::where('email','email@email.com')->firstOrFail();

       //$userProfile=Profile::where('user_id',$user->id)->firstOrFail();

        //dapatkan Profile dengan user_id = $id
       $userProfile=Profile::whereUserId($id)->firstOrFail();

       //dd($userProfile);


       //$testrecord = SmokingRecord::find($this->route()->parameter('id'));

        return view('profiles.show',compact('userProfile','user'));

        //return dd($testrecord);
          

        
        
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
        $userProfile=Profile::whereUserId($id)->firstOrFail();

        return view('profiles.edit',compact('userProfile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileFormRequest $request, $id)
    {
        //

        //return dd($request,$id);

       if($request){

        //dd($request);

        $userProfile = Profile::whereUserId($id)->firstOrFail();
        
       $user=User::whereId($id)->firstOrFail(); 

       $user->first_name = $request->first_name;
       $user->last_name = $request->last_name; 
       $user->save();
        
        $userProfile->dob = $request->dob;
        $userProfile->smoked = $request->smoked;
        //$userProfile->lat = $request->lat;
        //$userProfile->lng = $request->lng;
        $userProfile->city = $request->city;
        $userProfile->country = $request->country;
        $userProfile->postcode = $request->postcode;
        $userProfile->phone = $request->phone;
        $userProfile->save();


        //$userProfile->user()->associate($user);

       

        
        //return redirect()->action('ProfileController@edit');

       //return redirect()->route('profileEdit', ['id' => $userProfile->user_id])->with('success','Update Successful !');

         //return redirect('/profile')->with('success','Update Successful !');

        //->route('profile',$id)->with('success','Update Successful !');;
        
        return redirect()->back()->with('status','Update Successful !');
       
       }else
      // return redirect()->back()->withErrors('Permission Denied!');
       return redirect()->back()->withErrors('Update Failed !');
       //return redirect('/profile')->withErrors('Update Failed !');
        

        //Profile::where('user_id', $id)->update($request->all());

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
