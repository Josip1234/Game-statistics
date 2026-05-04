<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index(){
        $platforms=Platform::orderBy('id')->paginate(5);
        return view("profile.platform.index",[
            "platforms"=>$platforms
        ]);
    }
    public function create(){
        return view("profile.platform.new");
    }
    public function store(Request $request){
        $validated=$request->validate([
            "name"=>['required','max:50','min:3'],
            "platform_history"=>['nullable']
        ]);
        Platform::create($validated);
        return redirect()->route('game.platform.index')->with('status','Successfully inserted new platform');
    }
    public function edit(Platform $platform){
        return view("profile.platform.edit",[
            "platform"=>$platform,
        ]);
    }
    public function update(Platform $platform, Request $request){
        $validated=$request->validate([
             "name"=>['required','max:50','min:3'],
            "platform_history"=>['nullable']
        ]);
        $platform->update($validated);
        return redirect()->route('game.platform.index')->with('status','Successfully updated platform.');
    }
}
