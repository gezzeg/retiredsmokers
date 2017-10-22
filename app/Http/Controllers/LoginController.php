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

					//$user = App\User::find(1);

					//return redirect('/dashboard');
					return redirect()->route('members.index');

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

	public function edit(){

		
		if(Sentinel::check()){

			$id = Sentinel::getUser()->id;

			$loginDetail = User::whereId($id)->firstOrFail();

		
			//dd($loginDetail);

			return view('authentications.edit',compact('loginDetail'));
		
		}

	}

	public function update(Request $request){
		
		if(Sentinel::check()){

			$user = Sentinel::getUser();
			
			// $id = Sentinel::getUser()->id;

			//dd($request);

			$hasher = Sentinel::getHasher();

			$oldPassword = $request->old_password;
	        $password = $request->password;
	        $passwordConf = $request->confirm_password;

	        //dd($oldPassword,$password,$passwordConf);

		        if (!$hasher->check($oldPassword, $user->password)  || $password != $passwordConf) {
		            
		            return redirect()->back()->withErrors('Error. Please check your input.');

		        }

			Sentinel::update($user, array('password' => $password));

	        return redirect()->back()->with('status','Update password successful.');

			}
		
	}

}
