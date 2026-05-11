<?php

namespace App\Http\Controllers;

use App\Models\MDetail;
use App\Models\Modification;
use Illuminate\Http\Request;

class MDetailController extends Controller
{
    public function index(Modification $modification){
        
        $mdetail=MDetail::with('modification')->where('mod_id','=',$modification->id)->orderBy('id')->paginate('5');
      
        return view("profile.mdetail.index",[
             'mdetails'=>$mdetail,
             'modification'=>$modification
        ]);
    }
}
