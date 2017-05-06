<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;

class MemberMiddleware
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

        //1. User must be authenticated
        //2. User must should be a "member"
        //3. User must own the 

        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'member')

            return $next($request);

        else

            return redirect('/login')->withErrors('Please login to access this area.');
        

        
    }
}
