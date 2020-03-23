<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::user()->user_type=='2'){
        return $next($request);    
        }
        // elseif(Auth::user()->user_type=='3'){
        // return redirect('custodian/dashboard');    
        // }
        
        else{
            return redirect('front/rooms');
        }
    }
}
