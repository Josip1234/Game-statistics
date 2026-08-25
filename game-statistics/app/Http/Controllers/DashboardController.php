<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function homepage(){
        return view('welcome');
    }
    public function dashboard(){
        $lastRegisteredId=User::selectRaw("max(id) as lastUser")->get();
        $lastRegisteredUser=User::where('id','=',$lastRegisteredId[0]["lastUser"])->get();
        $userAdded=$lastRegisteredUser[0]["created_at"];
        $username=$lastRegisteredUser[0]["nickname"];

        return view('dashboard',[
            "user"=>$username,
            "registered"=>$userAdded
        ]);
    }
}
