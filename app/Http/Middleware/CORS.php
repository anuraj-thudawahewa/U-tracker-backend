<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
        ->header('Access-control-Allow-Origin','*')
        ->header('Access-control-Allow-Methods','PUT,GET,POST,DELETE,OPTIONS,PATCH')
        ->header('Access-control-Allow-Headers','Origin, Content_Type, Accept, Authorization, X-request-With, cache-control')
        ->header('Access-control-Allow-Credentials','true');

    }
}
