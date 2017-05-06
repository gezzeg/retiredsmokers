<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Sentinel;

class OwnerMiddleware
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
        

        $ProfileId = $request->segments()[1];

       // $article = Article::find($this->route()->parameter('id'));

        $profile = Profile::findOrFail($ProfileId);
        //dd($ProfileId);


        //$profile = Profile::findOrFail($request->user()->id);

        //$profile = Profile::find($this->route('id'));

        //$article = Profile::findOrFail($articleId



       /* if ($profile->user_id !== $this->user()->id) {
            abort(403, 'Unauthorized action.');
        }*/


/*
         if ($profile->user_id !== $this->user()->id) {
            abort(403, 'Unauthorized action.');
        }*/

            if ($profile->user_id !== Sentinel::getUser()->id) {
            
           // dd($request->user()->id);
            //abort(403, 'Unauthorized action.');
               return redirect('/profile')->withError('Permission Denied');

            }

        return $next($request);


    }
}
