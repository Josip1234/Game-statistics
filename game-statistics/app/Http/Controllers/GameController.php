<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class GameController extends Controller
{
    public function homepage(){ 
        $games=Game::join('users','game.user_id','=','users.id')
        ->select(
            'game.id',
            'game.name',
            'game.yearOrRangeOfProduction',
            'users.nickname')
         ->orderBy('game.id')
         ->paginate(5);
       
        return view('profile.game.index',[
            "games"=>$games,
        ]);
    }
    public function create(){
        return view('profile.game.create');
    }
    public function add(Request $request){
        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','min:4'],
            'user_id'=>['required']
        ]);
        Game::create($validated);
        return redirect()->route('profile.game.homepage')->with('status','New game successfully added.');
    }
      public function edit(Game $game){
        return view('profile.game.edit',
        ["game"=>$game]);
    }
        public function update(Request $request,Game $game){
        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','min:4'],
            'user_id'=>['required']
        ]);
        $game->update($validated);
        return redirect()->route('profile.game.homepage')->with('status','Game successfully updated.');
    }
    public function delete(Game $game){
        $game->delete();
         return redirect()->route('profile.game.homepage')->with('status','Game successfully deleted.');
    }
}
