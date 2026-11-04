<?php

namespace App\Http\Controllers;

use App\Models\AStat;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Sequel;
use App\Services\GameService;

use function Symfony\Component\String\b;

class AdStatisticsController extends Controller
{
    public function gkeyval(Game $game,Statistics $statistics){
        return view("profile.adstat.jkeyval",[
            'statistics'=>$statistics,
            'game'=>$game
        ]);
    }
    public function skeyval(Sequel $sequel,Statistics $statistics){

        return view("profile.adstat.jkeyval",[
            'statistics'=>$statistics,
            'sequel'=>$sequel
        ]);
    }
    //next two functions recieves request from form input, game service which converts input data to json array
    //game as part of parameter url and statistics object (we must get statistic id to insert into database)
    //new file name is being set by unique id (game name or sequel name)
    //inputed request is being converted to array of key values
    //then that array is being given to game service to convert it to json array
    //as a response, we got json array which will be stored in server
    //in our database, only url will be stored
    //data will be pulled from json depending on url in our database.
    //when we got json, we need original json data content (just for test)
    //need to validate key val data in case empty values can be passed this is next step in development
    public function gsave_to_json(Request $request, GameService $gameService, Game $game, Statistics $statistics){
               $arrayData=array();
            $extension='.json';
               $name=str_replace([":"," ","."],"",$game->name);

            $file_name=uniqid($name.'_').$extension;
            $file_url='uploads/'.$file_name;

             foreach ($request->input() as $key => $value) {
                if($key==="_token") continue;
                 $arrayData[$key]=$value;
            }
           $gameService->set(array_keys($arrayData),array_values($arrayData),$file_name,$file_url);
            $json=$gameService->returnJsonKeyValues();
            $data=$json->original;
            $dat=$gameService->change_key_val($data);
            $gameService->saveGameAdStatistics($dat,true);
               $request->session()->put('file_name',$file_name);
            $request->session()->put('file_url',$file_url);
             return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully saved file: '.$file_name.', file: url: '.$file_url);
    }
    //before generating new statistic file url will be generated only if there is key values added
     public function ssave_to_json(Request $request, GameService $gameService, Sequel $sequel, Statistics $statistics){
            $arrayData=array();
            $extension='.json';
            $name=str_replace([":"," ","."],"",$sequel->name);
            $file_name=uniqid($name.'_').$extension;
             $file_url='uploads/'.$file_name;


            foreach ($request->input() as $key => $value) {
                if($key==="_token") continue;
                $arrayData[$key]=$value;
            }
            $gameService->set(array_keys($arrayData),array_values($arrayData),$file_name,$file_url);
            $json=$gameService->returnJsonKeyValues();
            $data=$json->original;
            $dat=$gameService->change_key_val($data);
            $gameService->saveGameAdStatistics($dat,true);
            $request->session()->put('file_name',$file_name);
            $request->session()->put('file_url',$file_url);
            return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully saved file: '.$file_name.', file: url: '.$file_url);

    }

    public function index(Request $request,Statistics $statistics){
        $adStat=AStat::with('statistics')->where('statistic_id','=',$statistics->id)->orderBy('id')->paginate(5);
        $page=$request->input("page");
        $idToShow=($request->input("page")==1 || !($request->input("page")))?0:(5*$page)-5;

        return view('profile.adstat.index',[
            'statistics'=>$statistics,
            'adStat'=>$adStat,
             "id"=>$idToShow
        ]);
    }
    public function create(Statistics $statistics){

        return view('profile.adstat.create',[
           'statistics'=>$statistics
        ]);
    }

    public function store(Statistics $statistics,Request $request){
        $validated=$request->validate([
              'statistic_id' => ['required','numeric','min:1'],
              'file_name'=>['required','string','max:100','unique:advanced_statistics,file_name','min:1'],
              'file_url'=>['required','string','unique:advanced_statistics,file_url','min:1']
        ]);
        AStat::create($validated);
        $request->session()->forget(['file_name','file_url']);
        return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully inserted new advanced statistics');
    }
    public function edit(Statistics $statistics, AStat $adstat){
            return view('profile.adstat.edit',[
                'statistics'=>$statistics,
                'adstat'=>$adstat
            ]);
    }
    public function update(Statistics $statistics, AStat $adstat,Request $request){
        $validated=$request->validate([
              'statistic_id' => ['required','numeric','min:1'],
              'file_name'=>['required','string','max:100','unique:advanced_statistics,file_name','min:1'],
              'file_url'=>['required','string','unique:advanced_statistics,file_url','min:1']
        ]);
        $adstat->update($validated);
        return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully updated statistic.');
    }
    public function delete(Statistics $statistics, AStat $adstat){
        $adstat->delete();
       return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully deleted statistic.');

    }
    public function readJsonData(Request $request,GameService $gameService,Statistics $statistics,AStat $adstat){

        $gameService->setFileUrl($adstat->file_url);
        $data=$gameService->loadData();
        $filtered=[];
        foreach ($data as $key => $value) {

                $filtered[$key]=$value;


        }
        $request->session()->put('file_url',$gameService->getFileUrl());

        return view("profile.adstat.jdi",[
            "statistics"=>$statistics,
            "adstat"=>$adstat,
            "addat"=>$filtered
        ]);
    }

    public function editAdvancedStatisticData(GameService $gameService,Statistics $statistics,Request $request){
        $file=$request->session()->get('file_url');
        //session forget we will use when data is updated
        //$request->session()->forget('file_url');
        $gameService->setFileUrl($file);
        $data=$gameService->loadData();

        return view("profile.adstat.jkeyval_edit",[
            "data_url"=>$file,
            "data"=>$data,
            "statistics"=>$statistics
        ]);
    }
    public function saveEditedData(GameService $gameService,Statistics $statistics,Request $request){
            //data without pair key1 val1 key2 val2 will be automaticcly removed from json
            //empty values for editing are allowed
            $data=array();
            $fileName=$request->input('file_name');
            $gameService->setFileUrl($fileName);
            //$removeData=$request->input('remove_fields');
              //filter null or empty values from keys or values
             foreach ($request->input() as $key => $value) {
                if($key==="_token") continue;
                if($key==="remove_fields") continue;
                //skip empty values do not add to array
                if($value===null || $value==="" || empty($value)) continue;
                //skip file name
                if($key==="file_name") continue;
                //also skip empty keys if exists
                if($key===null || $key==="" || empty($key)) continue;
                $data[$key]=$value;
            }

            //initialize index with 0
            $index=0;
            //initialize num 1 with -1
            $num1=-1;
            //initialize num 2 with -1
            $num2=-1;
            //for each data as key value
            //init new list data
            $new_data=array();
            //need four variables to remember key and value
            $rememberKey1="";
            $rememberValue1="";
            $rememberKey2="";
            $rememberValue2="";
            foreach ($data as $key => $value) {
                //if index is even find number in key and put it as number1 else put it as number 2
                //every even number is key every odd number is value to compare
                if($index%2==0){
                     $num1=preg_replace('/[^0-9]/', '', $key);
                     $rememberKey1=$key;
                     $rememberValue1=$value;
                }else{
                    $num2=preg_replace('/[^0-9]/', '', $key);
                    $rememberKey2=$key;
                    $rememberValue2=$value;
                }

                //if number 1 is different than number 2 increase index skip everything else otherwise print pair of key val numbers then increase index
                //put in new list only values which are equals
                if($num1!=$num2){
                     $index++;
                    continue;
                }
                else{

                    $new_data[$rememberKey1]=$rememberValue1;
                    $new_data[$rememberKey2]=$rememberValue2;

                    $rememberKey1="";
                    $rememberKey2="";
                    $rememberValue1="";
                    $rememberValue2="";

                }
                $index++;
            }

            $sortedDataByKeys=array();
            //need to have for example times drowned:15 key must be first not value
            //sorting algorhitm implementation
            $index=0;

            foreach ($new_data as $k => $v) {
                if($index%2==0){ //pokazivač na parove key val svaki parni je key
                    if($k[0]==="k"){ //u slučaju da je ključ k jednak k
                       $key1=$k;  //key1 pokazivač na key u paru
                       $value1=$v; //value1 pokazivač na value u paru
                       $index++;  //uvećaj index prilikom svake iteracije
                    }else{
                       $key2=$k;
                       $value2=$v;
                       $index++;
                    }
                }else{    //neprani predstavlja vrijednost
                     if($k[0]==="v"){
                        $key2=$k;
                        $value2=$v;
                        $index++;

                    }else{
                       $key1=$k;
                       $value1=$v;
                       $index++;
                    }

                 $sortedDataByKeys[$key1]=$value1;
                 $sortedDataByKeys[$key2]=$value2;
                }


            }

            dd($sortedDataByKeys);
            $gameService->saveGameAdStatistics($sortedDataByKeys,false);
            return redirect()->route('advanced.statistics.adhomepage',$statistics)->with('status','Successfully edited advanced statistics, file name:'.$fileName);








            }





    }


