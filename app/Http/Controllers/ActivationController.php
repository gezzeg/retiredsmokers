<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Sentinel;

use Activation;

class ActivationController extends Controller
{
    //Utk activation memerlukan $email / $id dan $activationCode 
    public function activate($email,$activationCode)
    {

    	$user = User::whereEmail($email)->first();

    	$userSentinel = Sentinel::findById($user->id);

    	if(Activation::complete($userSentinel,$activationCode)){

    		return redirect('/login')->with('status','Congratulation, Your Activation Complete.');

    	}else{

    	}

    }
}
