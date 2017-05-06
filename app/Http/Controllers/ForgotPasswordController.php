<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    //
    public function forgotPassword(){

    	return view('authentications.forgot-password');
    }

    public function postForgotPassword(Request $request){

    	//return $request->email;
    	
    	$user = User::whereEmail($request->email)->first();

    	//$userSentinel = Sentinel::getUser($user->id);
    	$userSentinel = Sentinel::findById($user->id);

    	//if user not exist (security purpose we just tell them we have sent the code)
    	if(count($user)== 0){
    		return redirect()->back()->with('status','Reset code have been sent to your email.');
    	}

    	//check if reminder is exist? if yes exit, else create new one.
    	$reminder = Reminder::exists($userSentinel) ? : Reminder::create($userSentinel);

    	//send the code to user email
    	$this->sendEmail($user,$reminder->code);

    	//redirect and notify user that the code have been sent
    	return redirect()->back()->with('status','Reset code have been sent to your email.');
    	
    }

    private function sendEmail($user,$code){

    	/**
    	 *	Mail::send('viewName',[var,object],function(){});
    	 */

    	Mail::send('emails.forgot-password',[
    		'user'=>$user,
    		'code'=>$code
    		],function($message) use ($user){
    			$message->from(env('MAIL_USERNAME'),'RetiredSmokers.org');
    			$message->to($user->email);
    			$message->subject("Hello $user->first_name, reset your password.");
    		}

    		);

    }

    public function resetPassword($email,$resetCode){

    	$user = User::byEmail($email);

    	$userSentinel = Sentinel::findById($user->id);

    	

    	if(count($user)== 0)
    		abort(404);
    	
    	if($reminder = Reminder::exists($userSentinel)){

    		//return $reminder->code;
    		
    		if($resetCode == $reminder->code){

    			return view('authentications.reset-password')->with('status','Please reset your password.');


    		}else{	
    			return redirect('/');
    		}

    		    	
    	}else{
    		return redirect('/');  
    	}
    
    }

    public function postResetPassword(Request $request, $email, $resetCode){

    	 	//dd($request->all());

    	//validate $request sent
    	$this->validate($request,[
    		'password'=>'confirmed|required|min:5',
    		'password_confirmation'=>'required|min:5'
    		]);	

    		//return $request->All();
    	
    	//find the user trough email
    	$user = User::byEmail($email);

    	//create user Sentnel
    	$userSentinel = Sentinel::findById($user->id);
    	
    	//if user not exist
    	if(count($user)== 0)
    		abort(404);
    	
    	//check if Reminder of the Sentinel user exist
    	if($reminder = Reminder::exists($userSentinel)){
    		if($resetCode == $reminder->code){

    			//complete reset process
    			Reminder::complete($userSentinel,$resetCode,$request->password);

    			//redirect to login with message success
    			return redirect('/login')->with('status','Password reset successful.');


    		}else{
    			return redirect('/');
    		}

    		    	}
    	else{
    		return redirect('/');  
    	}
    	
    }
}
