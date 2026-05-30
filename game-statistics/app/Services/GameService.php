<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class GameService{
    private array $keys;
    private array $values;
    private string $fileName;
    private string $file_url;

    //controller will first recieve values added from user then will activate this service 
    //will add key and values into this class then convert it to json 
    //after that file will be saved in public like images with unique name
    //response as a string value of file name will be returned to controller 
    //controller will save file to public folder 
    //then user will be redirected to additional form to input game or sequel name 
    // (or it will go by url then we will have sequel or game input hidden field depending on url)
    //which will also have stored session with string file name (url of the file stored in public)
    //folder  
    public function set(array $keys,array $values, string $fileName, string $file_url) {
        $this->keys=$keys;
        $this->values=$values;
        $this->fileName=$fileName;
        $this->file_url=$file_url;
    }

    public function setFileUrl(string $file_url){
        $this->file_url=$file_url;
    }

    public function returnJsonKeyValues(){
        $keys=array_values($this->keys);
        $values=array_values($this->values);

        if(sizeof($keys)===sizeof($values)){
            //since number of key and values must be the same
            //it is whatever if we are taking size of value field or 
            //key fields.
            $arraySize=count($keys);
            $twodarray=[];
            for ($i=0; $i < $arraySize; $i++) { 
                $ke=$keys[$i];
                $va=$values[$i];

                $twodarray[$ke]=$va;
            }
            return response()->json($twodarray);
        }else{
            return response('Size of arrays aredifferent',403);
        }

    }

    public function change_key_val(array $data):array{
        $array=array();
        
        for ($i=1; $i < sizeof($data); $i++) { 

                if(in_array("key".$i,$this->keys)){
                    $array[$data["key".$i]]=$data["val".$i];
                }else break;
                
        }
       
        return $array;
    }
    
    public function saveGameAdStatistics(array $data){
        
        $games=$this->loadGamesStat();
        $maxId=0;
        foreach ($games as $game) {
            $maxId=max($maxId,(int)($game['id']??0));
        }
        $maxId+=1;
       
        //$json='';
       // $json.="[{";
        for ($i=0; $i <sizeof($data) ; $i++) { 
            // $json.="\"id\":{$maxId},"; 
             $games['id']=$maxId;
             foreach ($data as $key => $value) {
               // $json.="\"{$key}\":{$value},"; 
                $games[$key]=$value;
             }
            // $json.="},{";
             
        }
       // $json.="}]";
       // print_r($games);
        $this->saveGameAStat($games);
    }
    private function saveGameAStat(array $games):void{
        Storage::put($this->file_url,json_encode($games, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
    private function loadGamesStat():array{
        if(!Storage::exists($this->file_url)){
            return [];
        }
        $file=Storage::get($this->file_url);
        $data=json_decode($file,true);
        return is_array($data)?$data:[];
    }
    public function loadData():array{
        return $this->loadGamesStat();
    }
}