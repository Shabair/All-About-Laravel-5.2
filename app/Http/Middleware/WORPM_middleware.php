<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class WORPM_middleware
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
        Log::info("WORPM_middleware middleware hitted");
        return $next($request);
    }
}
