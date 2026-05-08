<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Modification;
use App\Models\Sequel;

class ModificationController extends Controller
{
    public function index(Game $game){
        $modifications=Modification::with('games')->orderBy('id')->paginate(5);
        return view("profile.modification.index",[
            'modifications'=>$modifications,
            'game'=>$game
        ]);
    }
    public function seqIndex(Game $game,Sequel $sequel){
        $modifications=Modification::with('sequels')->orderBy('id')->paginate(5);
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
}
