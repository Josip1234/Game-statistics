<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
class RememberPreviousUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //$index=uniqid('prevurl_').'.'.Carbon::now()->format("d-m-Y H:i:s");
        $index=0;
        $routes=[];
        $previousUrl="";
        $currentUrl="";
        $previousRouteName="";
        $currentRouteName="";
        $previousUrl=url()->previous();
        $currentUrl=url()->current();
        
        $previousRouteName=session()->previousRoute();
        $request->session()->put($index,$previousRouteName);
        $index++;

        
        return $next($request);
    }
}
