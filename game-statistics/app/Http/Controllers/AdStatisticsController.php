<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Sequel;

class AdStatisticsController extends Controller
{
    public function gkeyval(Game $game,Statistics $statistics){
        return view("profile.adstat.jkeyval",[
            'statistics'=>$statistics,
            'game'=>$game
        ]);
    }
    public function skeyval(Sequel $sequel,Statistics $statistics){
     
        return view("profile.adstat.jkeyval",[
            'statistics'=>$statistics,
            'sequel'=>$sequel
        ]);
    }
}
