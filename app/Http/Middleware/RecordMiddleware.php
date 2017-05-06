<?php

namespace App\Http\Middleware;

use Closure;
use App\SmokingRecord;
use Sentinel;

class RecordMiddleware
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

        $RecordId = $request->segments()[1];
        $record = SmokingRecord::findOrFail($recordId);

        if ($record->user_id !== Sentinel::getUser()->id) {
            
           // dd($request->user()->id);
            //abort(403, 'Unauthorized action.');
            return redirect('/profile')->withError('Permission Denied');

            }
        return $next($request);
    }
}
