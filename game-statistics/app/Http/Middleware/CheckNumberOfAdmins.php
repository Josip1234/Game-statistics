<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckNumberOfAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=$request->input("userType");
        //if we want to change from admin to user
        if((int)$user===0){
        $numberOfAdminUsers=User::selectRaw('count(id) as adminCount')->where('userType','=','1')->get();
        $number=$numberOfAdminUsers[0]["adminCount"];
        if($number<=1){
              // abort(403,'There are no enough admins on website. Need at least two admins to edit users.');
               return redirect()->route('admin.users.index')->with('status','There are no enough admins on website. Need at least two admins to edit users.');

        }
        }
        $user=0;
        return $next($request);
    }
}
