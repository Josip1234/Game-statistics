<?php

namespace App\Http\Controllers;

use App\Models\Sequel;
use App\Models\Statistics;
use Illuminate\Http\Request;

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
            'started_playing'=>['nullable','date','after:today'],
            'ended_playing'=>['nullable','date'],
            'sequel_id'=>['nullable'],
            'game_id'=>['nullable'],
        ]);
        Statistics::create($validated);
        return redirect()->route("sequel.statistics.seqHomepage",$sequel)->with('status','Successfully inserted new statistic.');
    }
}
