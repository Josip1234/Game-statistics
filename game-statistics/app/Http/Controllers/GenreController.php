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
    public function genNew(){
        return view("profile.genre.new");
    }
    public function genStore(Request $request){
        $validated=$request->validate([
            "name"=>['required','max:50','min:3']
        ]);
        Genre::create($validated);
        return redirect()->route('game.genre.genGmIndex')->with('status','Added new game genre.');
    }
    public function genEdit(Genre $genre){
        return view("profile.genre.edit",[
            "genre"=>$genre
        ]);
    }
    public function genUpdate(Genre $genre,Request $request){
        $validated=$request->validate([
             "name"=>['required','max:50','min:3']
        ]); 
        $genre->update($validated);
        return redirect()->route('game.genre.genGmIndex')->with('status','Successfully updated genre.');
    }
}
