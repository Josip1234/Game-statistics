<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RememberPreviousUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $previousUrl="";
        $currentUrl="";
        $previousRouteName="";
        $currentRouteName="";
        $previousUrl=url()->previous();
        $currentUrl=url()->current();
       
        $previousRouteName=session()->previousRoute();
        

        dd($previousRouteName);
        return $next($request);
    }
}
