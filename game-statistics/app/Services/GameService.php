<?php
namespace App\Services;
class GameService{
    private array $keys;
    private array $values;
    private string $fileName;

    //controller will first recieve values added from user then will activate this service 
    //will add key and values into this class then convert it to json 
    //after that file will be saved in public like images with unique name
    //response as a string value of file name will be returned to controller 
    //controller will save file to public folder 
    //then user will be redirected to additional form to input game or sequel name 
    // (or it will go by url then we will have sequel or game input hidden field depending on url)
    //which will also have stored session with string file name (url of the file stored in public)
    //folder  
    public function set(array $keys,array $values, string $fileName) {
        $this->keys=$keys;
        $this->values=$values;
        $this->fileName=$fileName;
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
}