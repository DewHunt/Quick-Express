<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IfNotLoggedIn
{
    public function handle($request, Closure $next)
    {   if(Auth::guard('customer')->user() || Auth::guard('biker')->user() || Auth::guard('merchant')->user()){
            return redirect(url('/'));
            
        }else{
           return $next($request); 
        }
    }
}
