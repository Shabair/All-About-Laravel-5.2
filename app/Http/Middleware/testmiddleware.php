<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class testmiddleware
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
        Log::info("Log entry from the testingmiddleware");
        return $next($request);
    }
}
