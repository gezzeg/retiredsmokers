<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Sentinel;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //1. Dapatkan user ID
        //2. Semak sama ada profile sama tak
        //3. Allow to open page

        $UserId=$request->id;
       // $UserId = $request->segments()[1];

        dd($UserId);
        //$ProfileId = $request->segments()[1]; //boleh pakai
        //$ProfileId = $request->route()->parameter('id'); //boleh pakai
        //$profileId= Profile::find($this->route()->parameter('profileShow'));
        //$profile = Profile::findOrFail($ProfileId);
        //
        $profile=Profile::whereUserId($UserId)->first();

        if ($profile->user_id !== Sentinel::getUser()->id) {
            
           // dd($request->user()->id);
           // abort(403, 'Unauthorized action.');
              // return redirect('/profile')->withError('Permission Denied');
            return redirect()->back()->withErrors('Permission Denied! ID: '.$request->id);
            }

        return $next($request);
        
    }
}
