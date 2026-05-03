<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index(){
        $platforms=Platform::orderBy('id')->paginate(5);
        return view("profile.platform.index",[
            ["platforms"=>$platforms]
        ]);
    }
}
