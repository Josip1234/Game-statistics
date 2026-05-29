<?php

namespace App\Http\Middleware;

use App\Models\AStat;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class StorageCleanup
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $directory="uploads";
        //get list of files in table advanced statistics
        $ads=AStat::orderBy('id')->get();
        //get list of files of storage
        $files=Storage::allFiles($directory);
         //get size of list of statistic files and files from storage
         $asSize=count($ads);
         $fileSize=count($files);
 
   
         //storage paths to delete
         $paths=array();
         
         foreach ($files as $value) {
            $fileUrl=$value;
            
            foreach ($ads as $value2) {
                if($value2["file_url"]===$fileUrl) $files=array_diff($files,[$fileUrl]);
            }

         }
         $paths=$files;
            Storage::delete($paths);
         

        return $next($request);
    }
}
