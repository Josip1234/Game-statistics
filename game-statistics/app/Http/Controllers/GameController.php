<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Game_Genre;
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
          //list of checked values
          $game_genres=Game_Genre::select("genre_id")->where("game_id","=",$game->id)->distinct()->orderBy("id")->get();
         
        return view('profile.game.edit',
        ["game"=>$game,
         'genres'=>$genre,
         'platform'=>$platform,
         'gg'=>$game_genres,
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
  
        
         $listOfInputValues=$request->input("game_genre");
         //get all ids from game genre with game id we need to updated that records
         $ids=Game_Genre::selectRaw('id')->where("game_id","=",$game->id)->orderBy('id')->get();
         $mapValues=array();
         $inputIndex=0;
         //this will be used to make an array to insert new genre_id value
         $idToInsertIndex=1;
         //array to input new value if it is not checked
         $insertMapValues=array();
         $sizeOfArrayOfInputIds=count($ids);
         $indexOfInputValues=0;
         $idInsert=Game_Genre::selectRaw('max(id) as max')->where("game_id","=",$game->id)->get();
         $prevIdInsert=0;
         $sizeOfInputCheckboxValues=count($listOfInputValues);
         foreach ($ids as $updateIDs) {
          
            $id=$updateIDs;
            foreach ($listOfInputValues as $inputValues) { 
                  
                    
                    if($indexOfInputValues>$sizeOfInputCheckboxValues) break;

                    //if size of list input values array is exceeded size of the list of current id list 
                    if($indexOfInputValues>$sizeOfArrayOfInputIds){
                        $nextId=($prevIdInsert==0)?$idInsert[0]["max"]+1:$prevIdInsert;
                        $insertMapValues[]=[
                            "id"=>$nextId,
                            "input"=>$inputValues,
                        ];
                        $nextId++;
                        $prevIdInsert=$nextId; 
                    
                    }else{
                          $mapValues[]= [
                          "id"=>$id["id"],
                             "input"=>$inputValues,
                    ];
                   unset($listOfInputValues[$inputIndex]);
                    }
                    $indexOfInputValues++;
                  
                
            }
              $inputIndex++;
             
            
         }
 
         foreach ($mapValues as $values) {
             Game_Genre::where('id',$values["id"])->update([
                            'game_id'=>$game->id,
                            'genre_id'=>$values["input"],
                ]);
         }
         if(count($insertMapValues)>0){
              foreach ($insertMapValues as $value) {
                 Game_Genre::create([
                  'game_id'=>$game->id,
                    'genre_id'=>$value["input"],
               ]);
              }
              
         }
         /* 
         next implement will be if value has been unchecked delete it for that genre
         
         */
        $game->update($validated);
        return redirect()->route('profile.game.homepage')->with('status','Game successfully updated.');
    }
    public function delete(Game $game){
        $game->delete();
         return redirect()->route('profile.game.homepage')->with('status','Game successfully deleted.');
    }
}
