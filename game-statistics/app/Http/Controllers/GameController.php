<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\User;

class GameController extends Controller
{
    public function homepage(Request $request){ 
        $games=Game::with(['genre','platform'])->join('users','game.user_id','=','users.id') 
        ->select(
            'game.id',
            'game.name as gn',
            'game.yearOrRangeOfProduction',
            'game.have_sequel', 
            'game.genre_id',
            'game.platform_id',
            'users.nickname')
         ->orderBy('game.id')
         ->paginate(5);  
        $page=$request->input("page"); 
        $idToShow=($request->input("page")==1 || !($request->input("page")))?0:(5*$page)-5;

        return view('profile.game.index',[
            "games"=>$games,
            "id"=>$idToShow
        ]);
    }
    public function create(){
        $genre=Genre::orderBy('id')->get(); 
        $platform=Platform::orderBy('id')->get();
        return view('profile.game.create',[
            'genres'=>$genre,
            'platform'=>$platform
        ]);
    }
    public function add(Request $request){
        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','min:4'],
            'user_id'=>['required'],
            'have_sequel'=>['nullable','numeric'],
            'genre_id'=>['nullable','numeric'],
            'platform_id'=>['nullable','numeric']
        ]);
        Game::create($validated);
        return redirect()->route('profile.game.homepage')->with('status','New game successfully added.');
    }
      public function edit(Game $game){
          $genre=Genre::orderBy('id')->get();
          $platform=Platform::orderBy('id')->get();
        return view('profile.game.edit',
        ["game"=>$game,
         'genres'=>$genre,
         'platform'=>$platform
        ]);
    }
        public function update(Request $request,Game $game){
        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','min:4'],
            'user_id'=>['required'],
            'have_sequel'=>['nullable','numeric'],
             'genre_id'=>['nullable','numeric'],
              'platform_id'=>['nullable','numeric'],
              'game_genre.*'=>['not in:'.$game->genre_id, 'min:1','required'],
        ]);
  
        
        $game->update($validated);
        return redirect()->route('profile.game.homepage')->with('status','Game successfully updated.');
    }
    public function delete(Game $game){
        $game->delete();
         return redirect()->route('profile.game.homepage')->with('status','Game successfully deleted.');
    }
}
