<?php

namespace App\Http\Controllers;

use App\Models\AStat;


class SaveGameAdvStatisticController extends Controller
{
    public function home(AStat $aStat){
        return view("profile.save_game_adv_statistics.index");
    }
}
