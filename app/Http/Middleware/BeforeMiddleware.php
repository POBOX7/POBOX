<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Handler;

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
		 $response = $next($request);
		 $exception = $response->exception;
		
		// if(!empty($response->exception))
		// {
		// 	abort(404);
		// }
		// else
		// {
		// 	 return $next($request);
		// }
        
    }
}