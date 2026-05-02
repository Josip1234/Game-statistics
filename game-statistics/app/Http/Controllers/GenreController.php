<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genGmIndex(){
        $genres=Genre::orderBy('id')->paginate(5);
        return view("profile.genre.index",
        [
        "genres"=>$genres
        ]);
    }
}
