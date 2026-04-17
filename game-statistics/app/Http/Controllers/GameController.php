<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function homepage(){
        return view('profile.game.index');
    }
    public function create(){
        return view('profile.game.create');
    }
}
