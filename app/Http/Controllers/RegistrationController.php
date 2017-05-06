<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterFormRequest;

use Sentinel;

use Validator;

use App\User;

use App\Profile;

use App\SmokingRecord;

use Activation;

use Mail;

//use App\UserProfile;

class RegistrationController extends Controller
{
    //

	public function register()
	{

		return view('authentications.register');

	}

	public function postRegister(RegisterFormRequest $request)
	{

		//return dd($request->All());

/*		$credentials = [
    'email'    => 'john.doe@example.com',
    'password' => 'password',
];*/

		/* 
		$validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:posts|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }*/

        //$user=$request->All();

        //Register the $request user and activate
		//if(Sentinel::registerAndActivate($request->All())){
		
		//Register the $request user 
		if($userSentinel = Sentinel::register($request->All())){

			//Search the new registered user
			$user = User::whereEmail($request->get('email'))->firstOrFail();

			//Bind the user to Activation Table
			$activation=Activation::create($userSentinel);

			//Assign A Profile To The New Registered User 
			$userProfile = new Profile();
			$userProfile->user_id = $user->id;
			$userProfile->smoked = $request->smoked;
			$userProfile->lat = 3.1390030;
			$userProfile->lng = 101.6870696;

			$user->profile()->save($userProfile);
			
			//Find role
			$role=Sentinel::findRoleBySlug('member')->firstOrFail();

			//Attach the user to the Role
			$role->users()->attach($user);
			
			//$user = User::whereEmail($request->get('email'))->firstOrFail();

			//$user->smoked = $request->get('smoked');

			//$user->save();

			/*

			//$userProfile = User::wehereEmail($request->get('email'))->firstOfFail();
			$userProfile = new UserProfile();
			$userProfile->user_id = $request-> 


			*/
			$this->sendMail($user,$activation->code);

			return redirect()->back()->with('status','Registration Successful! Pleace check your email.');
		}else{
			return redirect()->back()->with('error','Registration Failed !');
			//return back()->withErrors($validator);
		}





	}

	private function sendMail($user,$activationCode)
	{

		/*

		 Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

        */


		Mail::send('emails.activation',
			['user'=>$user,'activationCode'=>$activationCode], 
			function($message) use ($user){
				$message->from(env('MAIL_USERNAME'),'RetiredSmokers.org');
				$message->to($user->email);
				$message->subject("Hello $user->first_name, activate your account.");

			}

			);
	}

}
