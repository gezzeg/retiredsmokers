<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Sentinel;

use Activation;

use Mail;

class ActivationController extends Controller
{
    //Utk activation memerlukan $email / $id dan $activationCode 
    public function activate($email,$activationCode)
    {

    	$user = User::whereEmail($email)->first();

    	$userSentinel = Sentinel::findById($user->id);

    	if(Activation::complete($userSentinel,$activationCode)){

            $this->sendMail($user);

    		return redirect('/login')->with('status','Congratulation, Your Activation Complete.');

    	}else{

    	}

    }

    private function sendMail($user)
    {

        /*

         Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

        */


        Mail::send('emails.new-account-registered',
            ['user'=>$user], 
            function($message) use ($user){
                $message->from(env('MAIL_USERNAME'),'RetiredSmokers.com');
                $message->to(env('MAIL_USERNAME'));
                $message->subject("Hello Admin, there are new member!");

            }

            );

    }
}


