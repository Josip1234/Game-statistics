<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;

class GameController extends Controller
{
    public function homepage(){ 
        $games=Game::orderBy('id')->paginate(5);
        return view('profile.game.index',[
            "games"=>$games;
        ]);
    }
    public function create(){
        return view('profile.game.create');
    }
    public function add(Request $request){
        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','max:255','min:4'],
            'user_id'=>['required']
        ]);
        Game::create($validated);
        return redirect()->route('profile.game.homepage')->with('status','New game successfully added.');
    }
}
