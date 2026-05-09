<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Modification;
use App\Models\Sequel;

class ModificationController extends Controller
{
    public function index(Game $game){
        $modifications=Modification::with('games')->
        where('game_id','=',$game->id)->orderBy('id')->paginate(5);
     
        return view("profile.modification.index",[
            'modifications'=>$modifications,
            'game'=>$game
        ]);
    }
    public function seqIndex(Game $game,Sequel $sequel){
        $modifications=Modification::with('sequels')->where('sequel_id','!=','null')->orderBy('id')->paginate(5);
        return view("profile.modification.index",[
            'modifications'=>$modifications,
            'game'=>$game,
            'sequel'=>$sequel
        ]);
    }
    public function seqCreate(Game $game,Sequel $sequel){
         return view("profile.modification.create",[
            'game'=>$game,
            'sequel'=>$sequel
         ]);
    }
    public function create(Game $game){
        return view("profile.modification.create",[
            'game'=>$game
        ]);
    }
    public function store(Game $game,Request $request){
        $validated=$request->validate([
            'name'=>['required','min:3','max:50'],
            'game_id'=>['required','numeric']
        ]);
        Modification::create($validated);
        return redirect()->route("game.sequel.modifications.index",$game)->with("status","Added new game modification.");
    }
    public function seqStore(Game $game,Sequel $sequel,Request $request){
           $validated=$request->validate([
            'name'=>['required','min:3','max:50'],
            'game_id'=>['required','numeric'],
            'sequel_id'=>['required','numeric']
        ]);
         Modification::create($validated);
        return redirect()->route("game.sequel.modifications.seqIndex",[$game,$sequel])->with("status","Added new sequel modification.");
    }
}
