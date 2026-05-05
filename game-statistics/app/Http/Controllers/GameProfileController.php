<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameProfileController extends Controller
{
    public function gpindex(Game $game){
        return view("profile.gprofile.index",[
            'game'=>$game
        ]);
    }
}
