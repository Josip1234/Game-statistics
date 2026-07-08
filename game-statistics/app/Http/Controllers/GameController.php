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
        $games=Game::with(['genre','platform','game_genres'])->join('users','game.user_id','=','users.id') 
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
       // $currentId=Game::selectRaw('max(id) as max')->get();
       // dd($currentId);
       // $nextId=$currentId[0]["max"]+1;
        $checked_ids=$request->input("game_genre");

        $validated=$request->validate([
            'name'=>['required','max:255','min:2'],
            'yearOrRangeOfProduction'=>['required','min:4'],
            'user_id'=>['required'],
            'have_sequel'=>['nullable','numeric'],
            'genre_id'=>['nullable','numeric'],
            'platform_id'=>['nullable','numeric'],
            'game_genre.*'=>['not in:'.$request->input("genre_id"), 'min:1','required'],
        ]);
        Game::create($validated);
            $LastInsertedID=Game::getPdo()->lastInsertId();
            dd($LastInsertedID);
            foreach ($checked_ids as $value) {
                Game_Genre::create([
                    'game_id'=>$LastInsertedID,
                    'genre_id'=>$value
                ]);
          }
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
  
             //get checked values from input
         $listOfInputValues=$request->input("game_genre");
       
         $completedListOfGenreValues=Genre::orderBy("id")->get();
         $selectedGenreValue=$request->input("genre_id");
         //create array which will contain game_genre_id for deletion
         //this contains array of genre ids which will be deleted if not checked 
         $unchecked_ids=array();
         //list of values to create
         $checked_ids=array();

         //process completed list create new values 
         //need ids for create
         //list of genres  in game_genres
         $list_genres_in_game_genres=Game_Genre::where("game_id","=",$game->id)->orderBy("id")->get();

         //copy list of input vals 
         $inputvalCopy=$listOfInputValues;
  
             foreach ($list_genres_in_game_genres as  $val) {
                //echo $val["genre_id"]."<br>";
                foreach ($inputvalCopy as $key => $value) {
                    if($val["genre_id"]==$value){ unset($inputvalCopy[$key]); break;}
                   
                }
                //echo "<br>";
             }
             foreach ($inputvalCopy as $key => $value) {
                    $checked_ids[]=$value;
             }
          
            
     
         //process completed list of values 
         foreach ($completedListOfGenreValues as $key => $values) {
            //if value is selected skip it 
            if($selectedGenreValue==$values["id"]){
                $unchecked_ids[]=$values["id"];
                //delete selected val from the list 
                unset($completedListOfGenreValues[$key]);
                continue;
            }
         }
      
    
        //process checked list 
        //need another iteration to get correct id-s for not selected values 
        foreach ($completedListOfGenreValues as $key => $value) {
            $id=$value["id"];
            foreach ($listOfInputValues as $val) {
                //if id in completed list are equal to val in input values that values are checked continue
                if($id==$val){
                    unset($completedListOfGenreValues[$key]);
                } 
                else continue;
            }
        }
        foreach ($completedListOfGenreValues as $key => $value) {
             $unchecked_ids[]=$value["id"];
        }
        //now we have a list of values to delete in game_genre table
        
          //delete unchecked values
         foreach ($unchecked_ids as $value) {
            Game_Genre::where('game_id',$game->id)->where('genre_id',$value)->delete();
         }
       
          //create checked values
          foreach ($checked_ids as $value) {
                Game_Genre::create([
                    'game_id'=>$game->id,
                    'genre_id'=>$value
                ]);
          }
         /* 
         next implement will be if value has been unchecked delete it for that genre
         
             Game_Genre::where('id',$values["id"])->update([
                            'game_id'=>$game->id,
                            'genre_id'=>$values["input"],
                ]);
                    Game_Genre::where('id',$values["id"])->delete([
                            'game_id'=>$game->id,
                            'genre_id'=>$values["input"],
                ]);


         */
        $game->update($validated);
        return redirect()->route('profile.game.homepage')->with('status','Game successfully updated.');
    }
        
    public function delete(Game $game){
        $game->delete();
         return redirect()->route('profile.game.homepage')->with('status','Game successfully deleted.');
    }
}
