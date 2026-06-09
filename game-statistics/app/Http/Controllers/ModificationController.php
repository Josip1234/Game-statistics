<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Modification;
use App\Models\Sequel;

class ModificationController extends Controller
{
    public function index(Request $request,Game $game){
        $modifications=Modification::with('games')->
        where('game_id','=',$game->id)->orderBy('id')->paginate(5);
        $page = $request->input("page");
        $idToShow=($request->input("page")==1 || !($request->input("page")))?0:(5*$page)-5;

     
        return view("profile.modification.index",[
            'modifications'=>$modifications,
            'game'=>$game,
             'id'=>$idToShow
        ]);
    }
    public function seqIndex(Request $request,Game $game,Sequel $sequel){
        $modifications=Modification::with('sequels')->where('sequel_id','!=','null')->
        where('sequel_id',"=",$sequel->id)->orderBy('id')->paginate(5);
         $page = $request->input("page");
            $idToShow=($request->input("page")==1 || !($request->input("page")))?0:(5*$page)-5;
        return view("profile.modification.index",[
            'modifications'=>$modifications,
            'game'=>$game,
            'sequel'=>$sequel,
            'id'=>$idToShow
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
    public function edit(Game $game,Modification $modification){
        return view("profile.modification.edit",[
            'game'=>$game,
            'modification'=>$modification
        ]);
    }
    public function seqEdit(Game $game,Sequel $sequel, Modification $modification){
        return view("profile.modification.edit",[
            'game'=>$game,
            'sequel'=>$sequel,
            'modification'=>$modification
        ]);
    }
    public function update(Game $game, Modification $modification, Request $request){
        $validated=$request->validate([
            'name'=>['required','min:3','max:50'],
            'game_id'=>['required','numeric']
        ]);
        $modification->update($validated);
        return redirect()->route("game.sequel.modifications.index",$game)->with("status","Successfully updated game modification.");
    }
    public function seqUpdate(Game $game,Sequel $sequel, Modification $modification, Request $request){
                   $validated=$request->validate([
            'name'=>['required','min:3','max:50'],
            'game_id'=>['required','numeric'],
            'sequel_id'=>['required','numeric']
        ]);
         $modification->update($validated);
        return redirect()->route("game.sequel.modifications.seqIndex",[$game,$sequel])->with("status","Successfully updated sequel modification.");
    }

    public function delete(Game $game,Modification $modification){
        $modification->delete();
        return redirect()->route("game.sequel.modifications.index",$game)->with("status","Successfully deleted game modification.");

    }
    public function seqDelete(Game $game, Sequel $sequel, Modification $modification){
        $modification->delete();
        return redirect()->route("game.sequel.modifications.seqIndex",[$game,$sequel])->with("status","Successfully deleted sequel modification.");

    }
}
