<?php

namespace App\Http\Controllers;

use App\Models\AStat;
use App\Models\Game;
use App\Models\Profile;
use App\Models\Sequel;
use App\Models\Statistics;

class SaveGameAdvStatisticController extends Controller
{
    //jedan treba na game bez sequela drugi sa sequelom
    public function home(Game $game,Profile $profile,Statistics $aStat){
        dd($aStat->statistic_id);
        //get list of all statistics where statistic id equals statistic id
        $listOfAdvancedStatistics=AStat::with("statistics")->where("statistic_id","=",$aStat->statistic_id)->orderBy('id')->get();
        //get save game list
        $listOfSaveGames="";
        dd($listOfAdvancedStatistics);
        return view("profile.save_game_adv_statistics.index");
    }
      //sequel
      public function seqHome(Game $game,Sequel $sequel,Profile $profile,Statistics $aStat){
        dd($aStat->statistic_id);
        //get list of all statistics where statistic id equals statistic id
        $listOfAdvancedStatistics=AStat::with("statistics")->where("statistic_id","=",$aStat->statistic_id)->orderBy('id')->get();
        //get save game list
        $listOfSaveGames="";
        dd($listOfAdvancedStatistics);
        return view("profile.save_game_adv_statistics.index");
    }
}
