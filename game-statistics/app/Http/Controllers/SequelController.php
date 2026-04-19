<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Sequel;

class SequelController extends Controller
{
    public function index(Game $game){
        $sequels=Sequel::orderBy('id')->where('sequel.game_id','=',$game->id)->paginate(5);
        return view("profile.sequel.index",["game"=>$game,
        "sequels"=>$sequels]);
    }
    public function create(Game $game){
        return view("profile.sequel.create",[
            "game"=>$game
        ]);
    }
    public function save(Request $request, Game $game){
        $validated=$request->validate([
            'game_id'=>['required','numeric'],
            'name'=>['required','min:2','max:50'],
            'game_version'=>['nullable','min:3','max:50'],
            'version_history'=>['nullable','min:3'],
            'publish_year'=>['required','numeric'],
        ]);
        Sequel::create($validated);
        return redirect()->route('game.sequel.homepage',$game)->with('status','Successfully inserted new sequel.');
    } 
    public function edit(Game $game, Sequel $sequel){
        return view("profile.sequel.edit",[
            'game'=>$game,
            'sequel'=>$sequel
        ]);
    }

       public function update(Request $request, Game $game, Sequel $sequel){
        $validated=$request->validate([
            'game_id'=>['required','numeric'],
            'name'=>['required','min:2','max:50'],
            'game_version'=>['nullable','min:3','max:50'],
            'version_history'=>['nullable','min:3'],
            'publish_year'=>['required','numeric'],
        ]);
        $sequel->update($validated);
        return redirect()->route('game.sequel.homepage',$game)->with('status','Successfully updated sequel.');
    } 
    public function delete(Game $game, Sequel $sequel){
        $sequel->delete();
        return redirect()->route('game.sequel.homepage',$game)->with('status','Successfully deleted sequel.');

    }
}
