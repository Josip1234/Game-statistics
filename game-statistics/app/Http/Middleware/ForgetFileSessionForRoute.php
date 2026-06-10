<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForgetFileSessionForRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if route is modification details store 
        //if validation for modification details has passed 
        //forget session original file name and redirect
        if($request->routeIs("modification.details.store")){
       
            if($request->session()->exists(['original_file_name','redirect'])){
                $request->session()->forget(['original_file_name','redirect']);
            }elseif($request->session()->exists('original_file_name')){
                 $request->session()->forget('original_file_name');
            }elseif($request->session()->exists('redirect')){
                $request->session()->forget('redirect');
            }
        }elseif($request->routeIs("modification.details.create")){
            
        }
        return $next($request);
    }
}
