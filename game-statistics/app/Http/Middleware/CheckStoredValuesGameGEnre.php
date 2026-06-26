<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Game;
use App\Models\Game_Genre;

class CheckStoredValuesGameGEnre
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $gameId=$request->input("game_id");
        $genreId=$request->input("genre_id");

        //check if there is any game_genre id in the table game_genre
        $list=Game_Genre::with(["game","genre"])->where("id","=",$gameId)->orderBy("id")->get();
     
        $listOfInputValues=$request->input("game_genre");
        
        if((int)sizeof($list)==0){
            foreach ($listOfInputValues as $value) {
                
                //if selected genre id is equal to checked id skip it
                if($genreId==$value){
                    continue;
                }else{
                    Game_Genre::create([
                    'game_id'=>$gameId,
                    'genre_id'=>$value
                ]);
                }
                
            }
        }
       
        return $next($request);
    }
}
