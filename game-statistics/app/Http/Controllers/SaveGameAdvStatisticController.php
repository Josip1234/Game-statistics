<?php

namespace App\Http\Controllers;

use App\Models\AStat;
use App\Models\Game;
use App\Models\Profile;
use App\Models\Sequel;
use App\Models\Statistics;
use Illuminate\Http\Request;

class SaveGameAdvStatisticController extends Controller
{
    //jedan treba na game bez sequela drugi sa sequelom
    public function home(Game $game,Profile $profile,AStat $adstat){
        dd($adstat);
        //get list of all statistics where statistic id equals statistic id
        $listOfAdvancedStatistics=AStat::with("statistics")->where("statistic_id","=",$adStat->statistic_id)->orderBy('id')->get();
        //get save game list
        $listOfSaveGames="";
        dd($listOfAdvancedStatistics);
        return view("profile.save_game_adv_statistics.index");
    }
      //sequel
      public function seqHome(Game $game,Sequel $sequel,Profile $profile,AStat $adstat){
        dd($adstat);
        //get list of all statistics where statistic id equals statistic id
        $listOfAdvancedStatistics=AStat::with("statistics")->where("statistic_id","=",$adStat->statistic_id)->orderBy('id')->get();
        //get save game list
        $listOfSaveGames="";
        dd($listOfAdvancedStatistics);
        return view("profile.save_game_adv_statistics.index");
    }
}
