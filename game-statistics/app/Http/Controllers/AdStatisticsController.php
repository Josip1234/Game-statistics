<?php

namespace App\Http\Controllers;

use App\Models\AStat;
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
               $request->session()->put('file_name',$file_name);
            $request->session()->put('file_url',$file_url);
             return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully saved file: '.$file_name.', file: url: '.$file_url);
    }
     public function ssave_to_json(Request $request, GameService $gameService, Sequel $sequel, Statistics $statistics){
            $arrayData=array();
            $extension='.json';
            $name=str_replace([":"," ","."],"",$sequel->name);
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
            $request->session()->put('file_name',$file_name);
            $request->session()->put('file_url',$file_url);
            return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully saved file: '.$file_name.', file: url: '.$file_url);

    }
     
    public function index(Statistics $statistics){ 
        $adStat=AStat::with('statistics')->where('statistic_id','=',$statistics->id)->orderBy('id')->paginate(5);
        
        return view('profile.adstat.index',[
            'statistics'=>$statistics,
            'adStat'=>$adStat
        ]);
    }
    public function create(Statistics $statistics){
        return view('profile.adstat.create',[
           'statistics'=>$statistics
        ]);
    }

    public function store(Statistics $statistics,Request $request){
        $validated=$request->validate([
              'statistic_id' => ['required','numeric','min:1'],
              'file_name'=>['required','string','max:100','unique:advanced_statistics,file_name','min:1'],
              'file_url'=>['required','string','unique:advanced_statistics,file_url','min:1'] 
        ]);
        AStat::create($validated);
        $request->session()->forget(['file_name','file_url']);
        return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully inserted new advanced statistics');
    }
    public function edit(Statistics $statistics, AStat $adstat){
            return view('profile.adstat.edit',[
                'statistics'=>$statistics,
                'adstat'=>$adstat
            ]);
    }
    public function update(Statistics $statistics, AStat $adstat,Request $request){
        $validated=$request->validate([
              'statistic_id' => ['required','numeric','min:1'],
              'file_name'=>['required','string','max:100','unique:advanced_statistics,file_name','min:1'],
              'file_url'=>['required','string','unique:advanced_statistics,file_url','min:1'] 
        ]);
        $adstat->update($validated);
        return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully updated statistic.');
    }
    public function delete(Statistics $statistics, AStat $adstat){
        $adstat->delete();
       return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully deleted statistic.');

    } 
    public function readJsonData(GameService $gameService,Statistics $statistics,AStat $adstat){
 
        $gameService->setFileUrl($adstat->file_url);
        $data=$gameService->loadData();
        $filtered=[];
        foreach ($data as $key => $value) {
          
                $filtered[$key]=$value;
            
        
        }
     
        return view("profile.adstat.jdi",[
            "statistics"=>$statistics,
            "adstat"=>$adstat,
            "addat"=>$filtered
        ]);
    }
 
}
