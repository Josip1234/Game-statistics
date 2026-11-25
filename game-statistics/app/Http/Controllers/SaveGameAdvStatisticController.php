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

        //get list of all statistics where statistic id equals statistic id
        //we are mapping advanced statistic  and profile one profile can have same name and different statistics
        //because it is possible to have multiple gameplay with the same profile and json statistic data
       // $listOfAdvancedStatistics=AStat::join("statistics","advanced_statistics.statistic_id","=","statistics.id")->
        //where("statistics.game_id","=",$game->id)->get();
        //get save game list


        //need list of profiles per one game
        $listOfSaveGames=Profile::where("game_id","=",$game->id)->where("sequel_id","=",null)->orderBy('id')->get();


        return view("profile.save_game_adv_statistics.index",[
            "listOfProfiles"=> $listOfSaveGames,
            "advancedStatToMap"=>$adstat
        ]);
    }
      //sequel
      public function seqHome(Game $game,Sequel $sequel,Profile $profile,AStat $adstat){
       // dd($adstat);
        //get list of all statistics where statistic id equals statistic id
             //   $listOfAdvancedStatistics=AStat::join("statistics","advanced_statistics.statistic_id","=","statistics.id")->
       // where("statistics.sequel_id","=",$sequel->id)->get();
        //get save game list


          $listOfSaveGames=Profile::where("sequel_id","=",$sequel->id)->orderBy('id')->get();

        return view("profile.save_game_adv_statistics.index",[
               "listOfProfiles"=> $listOfSaveGames,
            "advancedStatToMap"=>$adstat
        ]);
    }
}
