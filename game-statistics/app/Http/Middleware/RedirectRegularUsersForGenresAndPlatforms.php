<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectRegularUsersForGenresAndPlatforms
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=$request->user()->userType;
        if((int)$user===0){
           return redirect()->route('dashboard')->with('routeError','You do not have permission to access those urls.');
        }
        return $next($request);
    }
}
