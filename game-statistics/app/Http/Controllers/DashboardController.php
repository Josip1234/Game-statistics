<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function homepage(){
        return view('welcome');
    }
    public function dashboard(){

        return view('dashboard');
    }
}
