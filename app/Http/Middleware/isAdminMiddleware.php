<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class isAdminMiddleware
{
    public function handle($request, Closure $next)
    {

        if(Auth::check())
		{
		  if(Auth::user()->isAdmin())
			 {
			   return redirect()->route('admin');
			 }
		 
		 return redirect()->route('home_1');
		}			
	  return $next($request);
    }
}