<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Sequel;
use App\Services\GameService;

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
    //next two functions recieves request from form input, game service which converts input data to json array 
    //game as part of parameter url and statistics object (we must get statistic id to insert into database)
    //new file name is being set by unique id (game name or sequel name)
    //inputed request is being converted to array of key values 
    //then that array is being given to game service to convert it to json array
    //as a response, we got json array which will be stored in server
    //in our database, only url will be stored 
    //data will be pulled from json depending on url in our database.
    //when we got json, we need original json data content (just for test)
    //need to validate key val data in case empty values can be passed this is next step in development
    public function gsave_to_json(Request $request, GameService $gameService, Game $game, Statistics $statistics){
               $arrayData=array();
            $extension='.json';
               $name=str_replace([":"," ","."],"",$game->name);
            $file_name=uniqid($name.'_').$extension;
            $file_url='uploads/'.$file_name;
            $statistic_id=$statistics->id;
             foreach ($request->input() as $key => $value) {
                if($key==="_token") continue;
                 $arrayData[$key]=$value;
            }
           $gameService->set(array_keys($arrayData),array_values($arrayData),$file_name,$file_url);
            $json=$gameService->returnJsonKeyValues(); 
            $data=$json->original;
            $dat=$gameService->change_key_val($data);
            $gameService->saveGameAdStatistics($dat);  
    }
     public function ssave_to_json(Request $request, GameService $gameService, Sequel $sequel, Statistics $statistics){
            $arrayData=array();
            $extension='.json';
            $name=str_replace([":"," ","."],"",$sequel->name);
            $file_name=uniqid($name.'_').$extension;
             $file_url='uploads/'.$file_name.$extension;
              $statistic_id=$statistics->id;
            foreach ($request->input() as $key => $value) {
                if($key==="_token") continue;
                $arrayData[$key]=$value;
            }
            $gameService->set(array_keys($arrayData),array_values($arrayData),$file_name,$file_url);
            $json=$gameService->returnJsonKeyValues(); 
            $data=$json->original;
            $dat=$gameService->change_key_val($data);     
            $gameService->saveGameAdStatistics($dat);

    }
}
