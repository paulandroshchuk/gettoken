<?php

namespace App\Http\Middleware;

use Closure;

class SetDefaultAcceptHeaderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $accept
     * @return mixed
     */
    public function handle($request, Closure $next, string $accept = 'application/json')
    {
        if (! $request->headers->has('Accept')) {
            $request->headers->set('Accept', $accept);
        }

        return $next($request);
    }
}
