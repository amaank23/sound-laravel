<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MusicMiddleware
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
        $response = $next($request);
        $response->header('Accept-Ranges', 'bytes');
        // $response->header
        return $response;
    }
}
