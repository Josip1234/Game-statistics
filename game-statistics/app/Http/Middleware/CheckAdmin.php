<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=$request->user(); //we want current user if it is logged in
        if(!$user || $user->userType !== 1){
            abort(403,'Only admin can access this site.');
        } //if user has not been initialized, or usertype is not admin cannot access to site
        return $next($request);
    }
}
