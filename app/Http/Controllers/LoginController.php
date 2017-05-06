<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;

use App\User;

use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;


class LoginController extends Controller
{
    //

	public function login()
	{
		return view('authentications.login');
	}



	public function postLogin(Request $request)
	{

		

		
	try{

			//dd($request->All());

			//return dd($request->All());
			//$User= User::whereEmail($request->get('email'))->firstOrFail();
			//$userSentinel = Sentinel::findByID($user);
			
			if(Sentinel::authenticate($request->All())){

				return redirect('/');

			}else{

				//return redirect('/login');
				return redirect()->back()->withErrors("Invalid Login");	

			}
			

			//Sentinel::login($user);

	}catch(ThrottlingException $e){	

		$delay = $e->getDelay();
		return redirect()->back()->withErrors("You have banned for $delay seconds.");	

	}catch(NotActivatedException $e){
		
		return redirect()->back()->withErrors("Your account not activated.");			

	}

		

	}


	public function postLogout()
	{
		if(Sentinel::logout()){
			return redirect('/');
		}
	}

	public function edit($id){

		$loginDetail = User::whereId($id)->firstOrFail();

		//dd($loginDetail);

		return view('authentications.edit',compact('loginDetail'));
	}

}
