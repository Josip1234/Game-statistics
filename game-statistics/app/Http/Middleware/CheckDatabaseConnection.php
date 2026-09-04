<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //DB CONNECTION MUST BE MYSQL
        if(env("DB_CONNECTION")!="mysql"){
            abort(403,'Database connection is not mysql. Access denied.');
        }
        //ENV VARIABLES FOR DATABASE CANNOT BE EMPTY
        if(env("DB_HOST")=="" || env("DB_DATABASE")=="" || env("DB_USERNAME")=="" || env("DB_PASSWORD")==""){
             abort(403,'Missing one of the database parameters.');
        }
    
       /* Log::info('Globalni',[ 
            'dbuser'=>env('DB_USERNAME'),
            'dbpass'=>env('DB_PASSWORD'),
            'dbhost'=>env('DB_HOST'),
            'dbconnection'=>env('DB_CONNECTION'),
            'route'=>$request->path()
        ]);*/
        return $next($request);
    }
}
