<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

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

        //data for graph
        // number of registered users per year
         //select count(u.id) as numberOfRegisteredUsers,date_format(u.created_at,"%Y") as yearOfRegistration
         //from users u group by yearOfRegistration desc;
         $numberOfRegisteredUsersPerYear=User::selectRaw('COUNT(id) as numberOfRegisteredUsers,YEAR(users.created_at) as yearOfRegistration')->
         groupBy('yearOfRegistration')->orderBy('yearOfRegistration','desc')->get();

         /*
         -- number of registered users per month by year
            select count(u.id) as numberOfRegisteredUsers,date_format(u.created_at,"%m") as monthOfRegistration
            from users u where date_format(u.created_at,"%Y") = 2024 group by monthOfRegistration desc;

            $vozila = Vozilo::with('namjena')
            ->whereHas('namjena', function ($q) {
                $q->where('naziv', 'Osobno');
            })
            ->get();

                $data = Vozilo::join('namjena_vozila', 'vozilo.namjenaid', '=', 'namjena_vozila.id')
            ->select(
                'vozilo.id',
                'vozilo.naziv',
                'vozilo.motor',
                'vozilo.registracija',
                'vozilo.istek_registracije',
                'namjena_vozila.naziv as namjena'
            )
            ->selectRaw('YEAR(vozilo.istek_registracije) as godina')
            ->orderBy('vozilo.id')
            ->where('vozilo.naziv', 'like', '%B%')
            ->get();


         */
       // $numberOfRegisteredUsersPerMonthByYear=User::selectRaw("COUNT(users.id) as numberOfRegisteredUsers, MONTH(users.created_at) as monthOfRegistration, YEAR(users.created_at) as yearOfRegistration")->having('yearOfRegistration',2024)->groupBy("monthOfRegistration","yearOfRegistration")->orderBy('monthOfRegistration')->get();


        return view('dashboard',[
            "user"=>$username,
            "registered"=>$userAdded,
            "listOfReggUsers"=>$numberOfRegisteredUsersPerYear,
        ]);
    }
    public function showGraphPerYear(Request $request){
        $year=$request->input("yearOfReg");
        $numberOfRegisteredUsersPerMonthByYear=User::selectRaw("COUNT(users.id) as numberOfRegisteredUsers, MONTH(users.created_at) as monthOfRegistration, YEAR(users.created_at) as yearOfRegistration")->having('yearOfRegistration',$year)->groupBy("monthOfRegistration","yearOfRegistration")->orderBy('monthOfRegistration')->get();
        return view('graph',[
            "registered"=>$numberOfRegisteredUsersPerMonthByYear
        ]);
    }
}
