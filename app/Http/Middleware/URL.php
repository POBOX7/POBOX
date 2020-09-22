<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\URL as Middleware;

class URL extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];
     public function handle($request, Closure $next)
    {
    	
    }
}
