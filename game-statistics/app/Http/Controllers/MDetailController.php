<?php

namespace App\Http\Controllers;

use App\Models\MDetail;
use App\Models\Modification;
use Illuminate\Http\Request;

class MDetailController extends Controller
{
    public function index(Request $request,Modification $modification){
        //after successfull insert new modification detail forget session variables for original file name and redirect
        if($request->session()->get("redirect")==="true"){
                    $request->session()->forget(['original_file_name','redirect']);
        }
       
        $mdetail=MDetail::with('modifications')->where('mod_id','=',$modification->id)->orderBy('id')->paginate('5');
         $page=$request->input("page");
                 $idToShow=($request->input("page")==1 || !($request->input("page")))?0:(5*$page)-5;

        return view("profile.mdetail.index",[
             'mdetails'=>$mdetail,
             'modification'=>$modification,
              "id"=>$idToShow
        ]);
    }
    public function create(Modification $modification){
        return view("profile.mdetail.create",[
            'modification'=>$modification
        ]);
    }
    public function store(Modification $modification, Request $request){
        
         
        $request->validate([
                "description"=>['required','min:10','max:255'],
                "file_url"=>['nullable','file'],
                "mod_id"=>['required','numeric'],
         ]); 
        
         
              $filePath=null;
              $fileName="";
        if($request->hasFile('file_url')){
            $file=$request->file('file_url');
          
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $filePath='uploads/'.$fileName; 
          
        } ; 

         $request->session()->put("original_file_name",$fileName); 
         $request->session()->put("redirect","true");
           
         MDetail::create([
             "description"=>$request->description,
             "file_url"=>$filePath,
             "mod_id"=>$request->mod_id,
         ]);
         $request->session()->forget(['original_file_name']);
         return redirect()->route('modification.details.index',$modification)->with('status','Successfully stored new modification detail');
    }
    public function edit(Modification $modification,MDetail $mdetail){
        return view("profile.mdetail.edit",[
             "modification"=>$modification,
             "mdetail"=>$mdetail
        ]);
    }

        public function update(Modification $modification, MDetail $mdetail,Request $request){
            if($request->file('file_url')===null){
                 $request->validate([
                "description"=>['required','min:10','max:255'],
                "mod_id"=>['required','numeric'],
         ]);
          $mdetail->update([
             "description"=>$request->description,
             "mod_id"=>$request->mod_id,
         ]);
            }else{
                 $request->validate([
                "description"=>['required','min:10','max:255'],
                "file_url"=>['nullable','file'],
                "mod_id"=>['required','numeric'],
         ]);
                  $filePath=null;
        if($request->hasFile('file_url')){
            $file=$request->file('file_url');
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $filePath='uploads/'.$fileName;
        } ;

         $mdetail->update([
             "description"=>$request->description,
             "file_url"=>$filePath,
             "mod_id"=>$request->mod_id,
         ]);
            }
        
         return redirect()->route('modification.details.index',$modification)->with('status','Successfully updated modification detail');
    }

    public function delete(Modification $modification, MDetail $mdetail){
        $mdetail->delete();
        return redirect()->route('modification.details.index',$modification)->with('status','Successfully deleted modification detail.');
    }
}
