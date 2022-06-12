<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Support\Google2FAAuthenticator;
use Illuminate\Contracts\Auth\Guard;


class Google2FAMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $authenticator = app(Google2FAAuthenticator::class)->boot($request);
 
        if ($authenticator->isAuthenticated()) {
            return $next($request);
        }
 
        return $authenticator->makeRequestOneTimePasswordResponse();
    }
}
