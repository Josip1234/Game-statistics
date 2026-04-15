<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateFileInput
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $file=$request->file('profilePicture');
        $extension=$file->getExtension();
        $allowedExtensions=[
              "jpg",
              "png",
              "webp",
              "gif",
              "svg",
              "jpeg",
              "tiff",
              "arw",
              "cr2",
              "raw",
              "rw2"
        ];
        $allowed=0;
        foreach ($allowedExtensions as $value) {
            if($extension===$value) $allowed=1; break;
        }
        if($allowed!=1){
            abort(403,"This file extension cannot be uploaded.");
        }
        return $next($request);
    }
}
