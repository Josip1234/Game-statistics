<?php

namespace App\Http\Controllers;

use App\Models\Sequel;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Game;

class SequelProfileController extends Controller
{
       public function spindex(Game $game,Sequel $sequel){
        $profile=Profile::with('sequel')->orderBy('id')->where('sequel_id','!=','null')->
        where('sequel_id','=',$sequel->id)->paginate(5);
        
        return view("profile.sprofile.index",[
            'game'=>$game,
            'sequel'=>$sequel,
            'profiles'=>$profile
        ]);
    }
    public function spcreate(Game $game,Sequel $sequel){
        return view("profile.sprofile.create",[
            'game'=>$game,
            'sequel'=>$sequel
        ]);
    }
    public function spstore(Game $game,Sequel $sequel, Request $request){
        $validated=$request->validate([
            'profile_name'=>['required','max:255','min:3'],
            'game_id'=>['required','numeric'],
            'sequel_id'=>['required','numeric']
        ]);
        Profile::create($validated);
        return redirect()->route("sequel.profile.index",[$game,$sequel])->with('status','New sequel profile has been created.');
    }
    public function spedit(Game $game,Sequel $sequel, Profile $profile){
        return view("profile.sprofile.edit",[
             'game'=>$game,
             'sequel'=>$sequel,
             'profile'=>$profile
        ]);
    }
    public function spupdate(Game $game,Sequel $sequel, Profile $profile, Request $request){
         $validated=$request->validate([
            'profile_name'=>['required','max:255','min:3'],
            'game_id'=>['required','numeric'],
            'sequel_id'=>['required','numeric']
        ]);
        $profile->update($validated);
        return redirect()->route("sequel.profile.index",[$game,$sequel])->with('status','Sequel profile has been updated.');
    }
    public function spdelete(Game $game,Sequel $sequel, Profile $profile){
        $profile->delete();
       return redirect()->route("sequel.profile.index",[$game,$sequel])->with('status','Sequel profile has been deleted.');
    }
}
