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
        // select max(id) as lastUser from users u where u.created_at = (select max(u.created_at) as maxRegisteredUserDate from users u);
        // select max(u.created_at) as maxRegisteredUserDate from users u;
        $maxDate=User::selectRaw("max(created_at) as maxRegisteredUserDate")->get();
        $lastRegisteredId=User::selectRaw("max(id) as lastUser")->where('created_at','=',$maxDate[0]["maxRegisteredUserDate"])->get();
        $lastRegisteredUser=User::where('id','=',$lastRegisteredId[0]["lastUser"])->get();
        $userAdded=$lastRegisteredUser[0]["created_at"];
        $username=$lastRegisteredUser[0]["nickname"];

        return view('dashboard',[
            "user"=>$username,
            "registered"=>$userAdded
        ]);
    }
}
