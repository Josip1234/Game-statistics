<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Profile;

class GameProfileController extends Controller
{
    public function gpindex(Game $game){
        $profile=Profile::with('game')->orderBy('id')->paginate(5);
        return view("profile.gprofile.index",[
            'game'=>$game,
            'profiles'=>$profile
        ]);
    }
    public function gpcreate(Game $game){
        return view("profile.gprofile.create",[
            'game'=>$game
        ]);
    }
    public function gpstore(Game $game, Request $request){
        $validated=$request->validate([
            'profile_name'=>['required','max:255','min:3'],
            'game_id'=>['required','numeric']
        ]);
        Profile::create($validated);
        return redirect()->route("game.profile.index",$game)->with('status','New game profile has been created.');
    }
}
