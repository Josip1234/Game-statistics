<?php

namespace App\Http\Controllers;

use App\Models\MDetail;
use App\Models\Modification;
use Illuminate\Http\Request;

class MDetailController extends Controller
{
    public function index(Modification $modification){
        
        $mdetail=MDetail::with('modifications')->where('mod_id','=',$modification->id)->orderBy('id')->paginate('5');
      
        return view("profile.mdetail.index",[
             'mdetails'=>$mdetail,
             'modification'=>$modification
        ]);
    }
    public function create(Modification $modification){
        return view("profile.mdetail.create",[
            'modification'=>$modification
        ]);
    }
    public function store(Modification $modification, Request $request){
         $validated=$request->validate([
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
        
         MDetail::create([
             "description"=>$request->description,
             "file_url"=>$filePath,
             "mod_id"=>$request->mod_id,
         ]);
         return redirect()->route('modification.details.index',$modification)->with('status','Successfully stored new modification detail');
    }
    public function edit(Modification $modification,MDetail $mdetail){
        return view("profile.mdetail.edit",[
             "modification"=>$modification,
             "mdetail"=>$mdetail
        ]);
    }

        public function update(Modification $modification, MDetail $mdetail,Request $request){
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
         return redirect()->route('modification.details.index',$modification)->with('status','Successfully updated modification detail');
    }
}
