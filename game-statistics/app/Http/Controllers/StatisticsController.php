<?php

namespace App\Http\Controllers;

use App\Models\Sequel;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Models\Game;


class StatisticsController extends Controller
{
    public function seqIndex(Sequel $sequel){
        $statistics=Statistics::with('sequels')->
        where('statistics.sequel_id','=',$sequel->id)->orderBy('id')->paginate(5);
        
        return view("profile.statistics.index",[
            "sequel"=>$sequel,
            "statistics"=>$statistics
        ]);
    }
    public function seqNew(Sequel $sequel){
        return view("profile.statistics.new",[
            "sequel"=>$sequel
        ]);
    } 
    public function seqSave(Sequel $sequel,Request $request){
        $validated=$request->validate([
            'game_progress'=>['required','max:50','min:2'],
            'hours_played'=>['required','min:0'],
            'started_playing'=>['required','date','before_or_equal:'.$request->input('ended_playing')],
            'ended_playing'=>['required','date','after_or_equal:'.$request->input('started_playing')],
            'sequel_id'=>['required'],
            'game_id'=>['nullable'],
        ]);
        Statistics::create($validated);
        return redirect()->route("sequel.statistics.seqHomepage",$sequel)->with('status','Successfully inserted new statistic.');
    }
    public function seqEdit(Sequel $sequel,Statistics $statistics){
        return view("profile.statistics.edit",[
            'sequel'=>$sequel,
            'statistics'=>$statistics
        ]);
    }
    public function seqStore(Sequel $sequel, Statistics $statistics, Request $request){
        $validated=$request->validate([
            'game_progress'=>['required','max:50','min:2'],
            'hours_played'=>['required','min:0'],
            //started playing must be before or equal to end playing
            'started_playing'=>['required','date','before_or_equal:'.$request->input('ended_playing')],
            //end playing must be after or equal started playing
            'ended_playing'=>['required','date','after_or_equal:'.$request->input('started_playing')],
            'sequel_id'=>['required'],
            'game_id'=>['nullable'],
        ]);
        $statistics->update($validated);
        return redirect()->route("sequel.statistics.seqHomepage",$sequel)->with('status','Successfully updated statistics.');
    }
    public function seqDelete(Sequel $sequel, Statistics $statistics){
        $statistics->delete();
        return redirect()->route("sequel.statistics.seqHomepage",$sequel)->with('status','Statistic successfully deleted.');
    }
    public function gamStIndex(Game $game){
          $statistics=Statistics::with('games')->
        where('statistics.game_id','=',$game->id)->orderBy('id')->paginate(5);
         return view("profile.statistics.index",[
            "statistics"=>$statistics,
            "game"=>$game
         ]);
    }

       public function gamStNew(Game $game){
        return view("profile.statistics.new",[
            "game"=>$game
        ]);
    }
    
        public function gamSave(Game $game,Request $request){
        $validated=$request->validate([
            'game_progress'=>['required','max:50','min:2'],
            'hours_played'=>['required','min:0'],
            'started_playing'=>['required','date','before_or_equal:'.$request->input('ended_playing')],
            'ended_playing'=>['required','date','after_or_equal:'.$request->input('started_playing')],
            'sequel_id'=>['nullable'],
            'game_id'=>['required'],
        ]);
        Statistics::create($validated);
        return redirect()->route("game.statistics.gamStIndex",$game)->with('status','Successfully inserted new game statistic, with no sequel.');
    }

     public function gamEdit(Game $game,Statistics $statistics){
        return view("profile.statistics.edit",[
            'game'=>$game,
            'statistics'=>$statistics
        ]);
    }

        public function gamStore(Game $game, Statistics $statistics, Request $request){
        $validated=$request->validate([
            'game_progress'=>['required','max:50','min:2'],
            'hours_played'=>['required','min:0'],
            //started playing must be before or equal to end playing
            'started_playing'=>['required','date','before_or_equal:'.$request->input('ended_playing')],
            //end playing must be after or equal started playing
            'ended_playing'=>['required','date','after_or_equal:'.$request->input('started_playing')],
            'sequel_id'=>['nullable'],
            'game_id'=>['required'],
        ]);
        $statistics->update($validated);
        return redirect()->route("game.statistics.gamStIndex",$game)->with('status','Successfully updated game statistics, with no sequel.');
    }


   public function gamDelete(Game $game, Statistics $statistics){
        $statistics->delete();
        return redirect()->route("game.statistics.gamStIndex",$game)->with('status','Statistic successfully deleted.');
    }

}
