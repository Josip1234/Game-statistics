<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genGmIndex(Game $game){
        $genres=Genre::orderBy('id')->paginate(5);
        return view("profile.genre.index",
        ["game"=>$game,
        "genres"=>$genres
        ]);
    }
}
